<?php

use App\Http\Controllers\Api\v1\CommentsController;
use Illuminate\Support\Facades\Route;

Route::controller(CommentsController::class)->middleware('auth:sanctum')->group(function ()
{
    Route::post('/meetings/{meeting}/comments/', 'create')->middleware(['auth', 'verified', 'user'])->name('comment.create');//посредник для юзера
});
