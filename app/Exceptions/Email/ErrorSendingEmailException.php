<?php

namespace App\Exceptions\Email;

use Exception;

class ErrorSendingEmailException extends Exception
{
    protected $message = "Error sending email";
}
