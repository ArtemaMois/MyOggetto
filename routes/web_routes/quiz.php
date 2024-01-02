<?php

use App\Http\Controllers\Api\v1\QuizzesController;
use Illuminate\Support\Facades\Route;

Route::controller(QuizzesController::class)->group(function() {
    Route::get('/quizzes/index', 'index')->name('quiz.index');
    Route::get('/quizzes/create', 'create')->name('quiz.create');
    Route::post('/quizzes/create', 'store')->name('quiz.store');
    Route::get('/quizzes/{quiz}', 'show')->name('quiz.show');
});
