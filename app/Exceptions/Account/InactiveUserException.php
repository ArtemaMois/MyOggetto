<?php

namespace App\Exceptions\Account;

use Exception;

class InactiveUserException extends Exception
{
    protected $message = "Your account is inactive";
}
