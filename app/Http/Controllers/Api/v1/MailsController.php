<?php

namespace App\Http\Controllers\Api\v1;

use App\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class MailsController extends Controller
{
    protected $mail;
    public function sendRegistrationEmail(string $email, array $data) {
        return Mail::sendEmail($email, $data);
    }
}
