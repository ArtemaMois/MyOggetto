<?php

use App\Http\Controllers\Api\v1\MeetingsController;
use Illuminate\Support\Facades\Route;

Route::controller(MeetingsController::class)->group(function () {
    Route::get('/', 'index')->middleware('guest.user')->name('meeting.index');
    Route::post('/meetings/{meeting}/sign', 'makeAppointment')->middleware(['auth', 'verified', 'user'])->name('meeting.sign');//посредник для юзера
    Route::post('/meetings/{meeting}/unsubscribe', 'unsubscribeUser')->middleware(['auth', 'verified', 'user'])->name('meeting.unsubscribe');//посредник для юзера
    Route::get('/meetings/info/{meeting}', 'show')->middleware(['auth', 'verified', 'user'])->name('meeting.show');//посредник для юзера
    Route::get('/meetings/user-meetings', 'meetingUsers')->middleware(['auth', 'verified', 'user'])->name('meeting.user');//посредник для юзера
    Route::get('/meetings/create', 'create')->middleware(['auth', 'verified', 'lector'])->name('meeting.create');//посредник для лектора
    Route::post('/meetings/create', 'store')->middleware(['auth', 'verified', 'lector'])->name('meeting.store');//посредник для лектора
    Route::get('/meetings/lector', 'updateList')->middleware(['auth', 'verified', 'lector'])->name('meeting.lector');//посредник для лектора
    Route::get('/meetings/lector/{meeting}', 'change')->middleware(['auth', 'verified', 'lector'])->name('meeting.change');//посредник для лектора
    Route::patch('/meetings/lector/{meeting}', 'update')->middleware(['auth', 'verified', 'lector'])->name('meeting.update');//посредник для лектора
    Route::delete('/meetings/{meeting}/delete', 'destroy')->middleware(['auth', 'verified', 'lector'])->name('meeting.destroy');//посредник для лектора
    Route::post('/meetings/lector/{meeting}/{filename}', 'deleteFile')->middleware(['auth', 'verified', 'lector'])->name('meeting.delete.file');//посредник для лектора
});
