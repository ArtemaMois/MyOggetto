<?php

use App\Http\Controllers\Api\v1\EventsController;
use Illuminate\Support\Facades\Route;

Route::controller(EventsController::class)->group(function() {
    Route::get('/events/index', 'index')->name('event.index');
    Route::get('/events/create', 'create')->name('event.create');
    Route::post('/events/create', 'store')->name('event.store');
    Route::get('/events/{event}/update', 'change')->name('event.change');
    Route::delete('/events/{event}', 'destroy')->name('event.delete');
    Route::get('/events/{event}', 'show')->name('event.show');
});
