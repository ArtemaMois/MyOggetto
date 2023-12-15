<?php

namespace App\Listeners;

use App\Events\MeetingCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use App\Facades\Mail;
use App\Exceptions\Email\ErrorSendingEmailException;
class MeetingEmailNotification
{


    /**
     * Handle the event.
     *
     * @param  \App\Events\MeetingCreated  $event
     * @return void
     */
    public function handle(MeetingCreated $event)
    {
        $body = meetingEmail($event->meeting);
        foreach($event->emails as $email){
            if (!Mail::sendEmail($email, $body)) {
                throw new ErrorSendingEmailException();
            };
        }
    }
}
