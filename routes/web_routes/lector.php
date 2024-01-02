<?php

use App\Http\Controllers\Api\v1\LectorsController;
use Illuminate\Support\Facades\Route;

Route::controller(LectorsController::class)->middleware('auth:sanctum')->group(function() {
    Route::get('/lectors/index', 'index')->name('lector.index');
    Route::get('/lectors/{lector}', 'show')->name('lector.show');
    Route::get('/lectors/{lector}/update', 'change')->name('lector.change');
    Route::patch('/lectors/{lector}/update', 'update')->name('lector.update');
    Route::delete('/lectors/{lector}', 'destroy')->name('lector.delete');
});
