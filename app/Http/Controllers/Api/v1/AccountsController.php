<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\Account\CreateAccountRequest;
use App\Http\Requests\Account\SignInAccountRequest;
use App\Http\Requests\Account\UpdateAccountRequest;
use App\Facades\Account;
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
        event(new Registered($user));
        return view('account.login');
    }

    public function change(User $user)
    {
        return view('account.account');
    }

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
        if(!auth()->attempt($request->validated())){
            return redirect()->back()->withErrors(['error' => 'Неверный логин или пароль']);
        };
        return redirect()->route('meeting.index');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('loginForm');
    }

    public function adminCreateUser(CreateAccountRequest $request)
    {
        User::query()->create($request->validated());
    }

    public function activeAccount(User $user)
    {
        Account::changeActivity($user);
        return responseOk();
    }
}
