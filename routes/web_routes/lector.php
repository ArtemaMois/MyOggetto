<?php

use App\Http\Controllers\Api\v1\LectorsController;
use Illuminate\Support\Facades\Route;

Route::controller(LectorsController::class)->group(function() {
    Route::get('/lectors/index', 'index')->middleware(['auth', 'verified', 'admin.user'])->name('lector.index');//посредник для юзера и админа
    Route::get('/lectors/{lector}', 'show')->middleware(['auth', 'verified', 'admin.user'])->name('lector.show');//посредник для юзера и админа
    Route::get('/lectors/{lector}/update', 'change')->middleware(['auth', 'verified', 'admin'])->name('lector.change');//посредник для админа
    Route::patch('/lectors/{lector}/update', 'update')->middleware(['auth', 'verified', 'admin'])->name('lector.update');//посредник для админа
    Route::delete('/lectors/{lector}', 'destroy')->middleware(['auth', 'verified', 'admin'])->name('lector.delete');//посредник для админа
});
