<?php

use App\Http\Controllers\Api\v1\AccountsController;
use Illuminate\Support\Facades\Route;

Route::controller(AccountsController::class)->group(function () {
    Route::get('/create', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'loginForm')->middleware('guest')->name('loginForm');
    Route::post('/login', 'login')->middleware('guest')->name('login');
    Route::post('/verify', 'verifyNotice')->name('account.verify');
    Route::post('/logout', 'logout')->middleware('auth')->name('logout');
    Route::get('/{user}', 'change')->middleware(['auth', 'verified'])->name('account.change');
    Route::patch('/{user}/update', 'update')->middleware(['auth', 'verified'])->name('update');
    Route::get('/admin/create', 'adminCreateUserForm')->middleware(['auth', 'verified', 'admin'])->name('account.admin.create');//посредник для админа
    Route::post('/admin/create', 'adminCreateUser')->middleware(['auth', 'verified', 'admin'])->name('account.admin.store');//посредник для админа
    Route::get('/admin/users', 'getUsers')->middleware(['auth', 'verified', 'admin'])->name('account.users');//посредник для админа
    Route::patch('/admin/users/{user}', 'accountActivity')->middleware(['auth', 'verified', 'admin'])->name('account.activity');//посредник для админа
    Route::post('/admin/users', 'searchUsers')->middleware(['auth', 'verified', 'admin'])->name('account.search');//посредник для админа
});

