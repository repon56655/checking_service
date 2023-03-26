<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CheckingController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index',[CheckingController::class,'index'])->name("index");
Route::get('/send/mail',[CheckingController::class,'send_mail'])->name("send.mail");
