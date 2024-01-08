<?php

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL as FacadesURL;
use PharIo\Manifest\Url;

Route::get('/email/verify', fn () => view(('account.verify_email')))->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    if (auth()->user()->profile_id === 3)
    {
        return redirect()->route('meeting.index');
    }
    if(auth()->user()->profile_id === 2)
    {
        return redirect()->route('meeting.create');
    }
    if(auth()->user()->profile_id === 1)
    {
        return redirect()->route('event.create');
    }
})->middleware(['auth', 'signed'])->name('verification.verify');

// Route::post('/email/verification-notification', function (Request $request) {
//     $request->user()->sendEmailVerificationNotification();
//     return back()->with('status', 'Ссылка для подтверждения отправлена на почту!');
// })->middleware(['auth', 'throttle:6,1'])->name('verification.send');
