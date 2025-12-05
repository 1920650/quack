<?php

use App\Http\Controllers\QuacksController;
use App\Http\Controllers\QuashtagController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('quacks', QuacksController::class);
Route::resource('users', UserController::class);
Route::resource('quashtags', QuashtagController::class);
