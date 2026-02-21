<?php

use App\Http\Controllers\QuacksController;
use App\Http\Controllers\QuashtagController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'login']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::resource('quacks', QuacksController::class)->middleware('auth');
Route::post('/quav/{quack}', [QuacksController::class, 'quav'])->middleware('auth')->name('quav');
Route::delete('/dequav/{quack}', [QuacksController::class, 'dequav'])->middleware('auth')->name('dequav');
Route::resource('users', UserController::class)->middleware('auth');
Route::resource('quashtags', QuashtagController::class)->middleware('auth');

Route::get('register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);
