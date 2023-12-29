<?php

use App\Http\Controllers\Api\v1\MeetingsController;
use Illuminate\Support\Facades\Route;

Route::controller(MeetingsController::class)->middleware(['auth:sanctum'])->group(function () {
    Route::get('/', 'index')->name('meeting.index')->withoutMiddleware(['auth:sanctum']);
    Route::post('/meetings/{meeting}/sign', 'makeAppointment')->name('meeting.sign');
    Route::post('/meetings/{meeting}/unsubscribe', 'unsubscribeUser')->name('meeting.unsubscribe');
    Route::get('/meetings/info/{meeting}', 'show')->name('meeting.show');
    Route::get('/meetings/meetings', 'meetingUsers')->name('meeting.user');
    Route::get('/meetings/create', 'create')->name('meeting.create');
    Route::post('/meetings/create', 'store')->name('meeting.store');
    Route::get('/meetings/lector', 'updateList')->name('meeting.lector');
    Route::get('/meetings/lector/{meeting}', 'change')->name('meeting.change');
    Route::patch('/meetings/lector/{meeting}', 'update')->name('meeting.update');
    Route::delete('/meetings/{meeting}/delete', 'destroy')->name('meeting.destroy');
    Route::post('/meetings/lector/{meeting}/{filename}', 'deleteFile')->name('meeting.delete.file');
});
