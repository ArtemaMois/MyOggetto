<?php


namespace App\Services;

use App\Models\Offer;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class MailService {

    public function sendEmail(string $email, array $data)
    {
        $mail = new PHPMailer(true);
        try{
            // $mail->SMTPDebug = 2;
            $mail->isSMTP();
            $mail->Host = "smtp.yandex.ru";
            $mail->SMTPAuth = true;
            $mail->Username = "ddcode.laravel@yandex.ru";
            $mail->Password = "lbmnwfnushhhqojx";
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->CharSet = "UTF-8";


            $mail->setFrom("ddcode.laravel@yandex.ru", "ddcode");
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = $data['header'];
            $mail->Body = $data['body'];
            return $mail->send();
        }catch(Exception $e){
            return false;
        }

    }
}

