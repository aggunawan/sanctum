<?php

use Illuminate\Support\Facades\Route;

Route::post('login', App\Http\Controllers\LoginController::class)->name('login.store');
Route::post('register', App\Http\Controllers\RegisterController::class)->name('register.store');