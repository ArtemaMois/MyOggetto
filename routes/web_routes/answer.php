<?php


use App\Http\Controllers\Api\v1\AnswersController;
use Illuminate\Support\Facades\Route;

Route::controller(AnswersController::class)->group(function() {
    Route::post('/quizzes/{quiz}/answers', 'create')->middleware(['auth', 'verified', 'user'])->name('answer.create');
});
