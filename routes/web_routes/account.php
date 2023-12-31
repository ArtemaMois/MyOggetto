<?php

use App\Http\Controllers\Api\v1\AccountsController;
use Illuminate\Support\Facades\Route;

Route::controller(AccountsController::class)->group(function () {
    Route::get('/create', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'loginForm')->name('loginForm');
    Route::post('/login', 'login')->name('login');
    Route::post('/logout', 'logout')->name('logout');
    Route::get('/{user}/', 'change')->name('account.change');
    Route::patch('/{user}/update', 'update')->name('update');
    Route::get('/admin/create', 'adminCreateUserForm')->name('account.admin.create');
    Route::post('/admin/create', 'adminCreateUser')->name('account.admin.store');
    Route::get('/admin/users', 'getUsers')->name('account.users');
    Route::patch('/admin/users/{user}', 'accountActivity')->name('account.activity');
    Route::post('/admin/users', 'searchUsers')->name('account.search');
});

