<?php

namespace App\Services;

use App\Exceptions\Account\InactiveUserException;
use App\Exceptions\Account\InvalidCredentialsException;
use App\Exceptions\Email\ErrorSendingEmailException;
use App\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AccountService
{
    public function createAccount($sourceData)
    {
        $data = [];
        $data = $sourceData;
        $data['password'] = Hash::make($sourceData['password']);
        $data['profile_id'] = 3;
        $name = explode(' ', $data['name']);
        $body = registerEmail($name[0]);
        if (!Mail::sendEmail($data['email'], $body)) {
            throw new ErrorSendingEmailException();
        };
        // dd($data);
        $user = User::query()->create($data);
        return $user;
    }

    public function signInAccount(string $email, string $password): string
    {
        $user = User::query()
            ->where('email', $email)
            ->first();

        if (!$user->is_active) {
            throw new InactiveUserException();
        }
        if (!empty($user)) {
            if (Auth::attempt(['email' => $email, 'password' => $password])) {
                return $user->createToken('api-token')->plainTextToken;
            }
        }

        throw new InvalidCredentialsException();
    }

    public function changeActivity(User $user)
    {
        if($user->is_active){
            $user->update(['is_active' => false]);
        } else{
            $user->update(['is_active' => true]);
        }
    }
}
