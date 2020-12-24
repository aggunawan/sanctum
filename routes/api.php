<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('me', App\Http\Controllers\MeController::class)->name('me.index');
});

Route::post('login', App\Http\Controllers\LoginController::class)->name('login.store');
Route::post('register', App\Http\Controllers\RegisterController::class)->name('register.store');