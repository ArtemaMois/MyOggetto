<?php

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL as FacadesURL;
use PharIo\Manifest\Url;

Route::get('/email/verify', fn () => view(('account.verify_email')))->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect()->route('meeting.index');
})->middleware(['auth','signed'])->name('verification.verify');

// Route::post('/email/verification-notification', function (Request $request) {
//     $request->user()->sendEmailVerificationNotification();
//     return back()->with('status', 'Ссылка для подтверждения отправлена на почту!');
// })->middleware(['auth', 'throttle:6,1'])->name('verification.send');
