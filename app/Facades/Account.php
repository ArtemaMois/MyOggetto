<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class Account extends Facade
{

    /**
     * @method static \App\Models\User createUser(array $data)
     * @method static \App\Models\User SignInAccount(string $email, string $password)

     * @see \App\Services\AccountService
     */
    protected static function getFacadeAccessor(): string
    {
        return "account_service";
    }
}
