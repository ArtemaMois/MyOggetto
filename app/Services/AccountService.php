<?php

namespace App\Services;

use App\Exceptions\Account\InactiveUserException;
use App\Exceptions\Account\InvalidCredentialsException;
use App\Exceptions\Email\ErrorSendingEmailException;
use App\Facades\Mail;
use App\Models\Lector;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use function Laravel\Prompts\alert;

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

    public function adminCreateAccount($sourceData)
    {
        $data = $sourceData;
        $data['password'] = Hash::make($sourceData['password']);
        $name = explode(' ', $data['name']);
        $body = registerEmail($name[0]);
        if (!Mail::sendEmail($data['email'], $body)) {
            throw new ErrorSendingEmailException();
        };
        if($sourceData['profile_id'] == 2){
            $lectorsData = $data;
            unset($lectorsData['profile_id']);
            unset($lectorsData['password']);
            Lector::query()->create($lectorsData);
        }
        unset($data['theme_id']);
        unset($data['description']);
        $user = User::query()->create($data);
        return $user;
    }

    public function getSortedUsers(): array
    {
        $users = User::all();
        $activeUsers = [];
        $unactiveUsers = [];
        foreach($users as $user)
        {
            if($user->is_active == 1){
                $activeUsers[] = $user;
            }
            else{
                $unactiveUsers[] = $user;
            }
        }
        $sortedUsers = [
            'active' => $activeUsers,
            'unactive' => $unactiveUsers
        ];

        return $sortedUsers;
    }

    public function serchedUsers($name): array
    {
        $users = [
            'active' => [],
            'unactive' => []
        ];
        $unsortedUsers = User::query()->where('name', 'LIKE', "%{$name}%")->get();
        foreach($unsortedUsers as $user)
        {
            if($user->is_active){
                $users['active'][] = $user;
            } else{
                $users['unactive'][] = $user;
            }
        }
        return $users;
    }
}
