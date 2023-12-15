<?php

use App\Http\Controllers\Api\v1\MeetingsController;
use Illuminate\Support\Facades\Route;

Route::controller(MeetingsController::class)->middleware(['auth:sanctum'])->group(function () {
    Route::get('/', 'index')->name('meeting.index')->withoutMiddleware(['auth:sanctum']);
    Route::post('/{meeting}/sign', 'makeAppointment')->name('meeting.sign');
    Route::get('/info/{meeting}', 'show')->name('meeting.show');
});
