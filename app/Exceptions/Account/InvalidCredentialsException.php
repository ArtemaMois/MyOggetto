<?php

namespace App\Exceptions\Account;

use Exception;

class InvalidCredentialsException extends Exception
{
    protected $message = "Invalid user credentials";
}
