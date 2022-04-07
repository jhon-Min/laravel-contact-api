<?php

use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\ContactController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::resource('contact', ContactController::class);
Route::post('/register', [ApiAuthController::class, 'register'])->name('register');
Route::post('/login', [ApiAuthController::class, 'login'])->name('login');
Route::post('/logout', [ApiAuthController::class, 'logout'])->middleware('auth:sanctum');
