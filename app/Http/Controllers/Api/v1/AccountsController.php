<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\Account\CreateAccountRequest;
use App\Http\Requests\Account\SignInAccountRequest;
use App\Http\Requests\Account\UpdateAccountRequest;
use App\Facades\Account;
use App\Http\Requests\Account\AdminCreateAccountRequest;
use App\Http\Requests\Account\SearchUsersRequest;
use App\Models\Profile;
use App\Models\Theme;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;

class AccountsController extends Controller
{

    public function register()
    {
        return view('account.register');
    }
    public function store(CreateAccountRequest $request)
    {
        $user = Account::createAccount($request->validated());
        // return redirect()->route('verification.notice')->with('message', 'Регистрация прошла успешно.
        // После подтверждения вашей электронной почты вы можете закрыть это окно');
        return redirect()->route('login');
    }

    // public function verify(User $user)
    // {
    //     event(new Registered($user));

    // }

    public function change(User $user)
    {
        return view('account.account');
    }


    //Доделать сброс пароля
    public function update(UpdateAccountRequest $request, User $user)
    {
        $data = $request->validated();
        // $data['password'] = Hash::make($request->input('password'));
        $user->update($data); //TODO
        return redirect()->back();
    }

    public function loginForm()
    {
        return view('account.login');
    }

    public function login(SignInAccountRequest $request)
    {
        if (!auth()->attempt($request->validated())) {
            return redirect()->back()->withErrors(['error' => 'Неверный логин или пароль']);
        };
        if (!auth()->user()->email_verified_at) {
            return redirect()->route('verification.notice');
        }
        return redirect()->route('meeting.index');
    }

    public function verifyNotice()
    {
        event(new Registered(auth()->user()));
        return redirect()->back()->with('status', 'Письмо отправлено на почту');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('loginForm');
    }

    public function adminCreateUserForm()
    {
        $themes = Theme::all();
        $profiles = Profile::query()->orderBy('id', 'desc')->get();
        return view('account.account_admin_create', [
            'profiles' => $profiles,
            'themes' => $themes
        ]);
    }

    public function adminCreateUser(AdminCreateAccountRequest $request)
    {
        $user = Account::adminCreateAccount($request->validated());
        event(new Registered($user));
        return redirect()->back();
    }

    public function getUsers()
    {
        $users = Account::getSortedUsers();
        return view('account.account_users', ['users' => $users]);
    }

    public function accountActivity(User $user)
    {
        Account::changeActivity($user);
        return redirect()->back();
    }

    public function searchUsers(SearchUsersRequest $request)
    {
        $users = Account::serchedUsers($request->input('name'));
        return view('account.account_users', ['users' => $users]);
    }
}
