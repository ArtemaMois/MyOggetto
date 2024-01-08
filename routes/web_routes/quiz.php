<?php

use App\Http\Controllers\Api\v1\QuizzesController;
use Illuminate\Support\Facades\Route;

Route::controller(QuizzesController::class)->group(function() {
    Route::get('/quizzes/index', 'index')->middleware(['auth', 'verified', 'admin.user'])->name('quiz.index');//посредник для админа и юзера
    Route::get('/quizzes/create', 'create')->middleware(['auth', 'verified', 'admin'])->name('quiz.create');//посредник для админа
    Route::post('/quizzes/create', 'store')->middleware(['auth', 'verified', 'admin'])->name('quiz.store');//посредник для админа
    Route::get('/quizzes/{quiz}', 'show')->middleware(['auth', 'verified', 'admin.user'])->name('quiz.show');//посредник для админа и юзера
});
