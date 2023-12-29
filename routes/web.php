<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


require __DIR__ . "/web_routes/meeting.php";
require __DIR__ . "/web_routes/account.php";
require __DIR__ . "/web_routes/verification/verify.php";
require __DIR__ . "/web_routes/comment.php";
require __DIR__ . "/web_routes/lector.php";
