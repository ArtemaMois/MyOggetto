<?php

use App\Http\Controllers\Api\v1\EventsController;
use Illuminate\Support\Facades\Route;

Route::controller(EventsController::class)->group(function() {
    Route::get('/events/index', 'index')->middleware(['auth', 'verified', 'admin.user'])->name('event.index');//посредник для юзера и админа
    Route::get('/events/create', 'create')->middleware(['auth', 'verified', 'admin'])->name('event.create');//посредник для админа
    Route::post('/events/create', 'store')->middleware(['auth', 'verified', 'admin'])->name('event.store');//посредник для админа
    Route::get('/events/{event}/update', 'change')->middleware(['auth', 'verified', 'admin'])->name('event.change');//посредник для админа
    Route::delete('/events/{event}', 'destroy')->middleware(['auth', 'verified', 'admin'])->name('event.delete');//посредник для админа
    Route::get('/events/{event}', 'show')->middleware(['auth', 'verified', 'admin.user'])->name('event.show');//посрдник для админа и юзера
});
