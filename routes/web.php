<?php

Route::post('login', App\Http\Controllers\LoginController::class)->name('login.store');
Route::post('register', App\Http\Controllers\RegisterController::class)->name('register.store');
Route::get('fallback', App\Http\Controllers\FallbackController::class)->name('fallback');
Route::get('/', App\Http\Controllers\FallbackController::class);
