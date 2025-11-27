<?php

use App\Http\Controllers\QuacksController;
use App\Models\Quack;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('quacks', QuacksController::class);