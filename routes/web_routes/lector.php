<?php

use App\Http\Controllers\Api\v1\LectorsController;
use Illuminate\Support\Facades\Route;

Route::controller(LectorsController::class)->middleware('auth:sanctum')->group(function() {
    Route::get('/lectors/index', 'index')->name('lector.index');
});
