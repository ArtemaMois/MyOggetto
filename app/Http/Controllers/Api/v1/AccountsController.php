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
        $user->update($request->validated());
        return responseOk();
    }

    public function loginForm()
    {
        return view('account.login');
    }

    public function login(SignInAccountRequest $request)
    {
        auth()->attempt($request->validated());
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
