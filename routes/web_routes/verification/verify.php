<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/email/verify/{id}/{hash}', fn () => 'verify')
->middleware(['auth', 'signed'])
->name('verification.verify'); //TODO
