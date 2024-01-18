<?php

use App\Http\Controllers\Api\v1\VerificationsController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL as FacadesURL;
use PharIo\Manifest\Url;

Route::controller(VerificationsController::class)->group(function () {

    Route::get('/email/verify', 'noticeForm')->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', 'verifyAccount')->middleware(['auth', 'signed'])->name('verification.verify');
});


