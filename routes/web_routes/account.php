<?php

use App\Http\Controllers\Api\v1\AccountsController;
use Illuminate\Support\Facades\Route;

Route::controller(AccountsController::class)->middleware('auth:sanctum')->group(function () {
    Route::get('/create', 'register')->withoutMiddleware('auth:sanctum')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'loginForm')->withoutMiddleware('auth:sanctum')->name('loginForm');
    Route::post('/login', 'login')->name('login');
    Route::post('/logout', 'logout')->name('logout');
    Route::get('/account/{user}/', 'change')->name('account.change');
});

