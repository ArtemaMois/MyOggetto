<?php
use App\Models\Meeting;

/**
  Функция, возвращающая положительный ответ
 *
 * @return void
 */
function responseOk()
{
    return response()->json(['status' => 'success']);
}

/**
  Функция, возвращающая данные для письма о регистрации
 */

function registerEmail(string $name): Array
{
    return [
        'header' => 'Письмо о регистрации',
        'body' => view('emails.register_mail', ['name' => $name])
    ];
}

/**
  Функция, возвращающая данные для уведомления о встрече
 */
function meetingEmail(Meeting $meeting)
{
    return [
        'header' => 'Письмо о новой встрече',
        'body' => view('emails.meeting_mail', ['theme' => $meeting->theme->name, 'date' => $meeting->date])
    ];
}
