<?php

use Illuminate\Support\Facades\Route;

Route::post('register', App\Http\Controllers\RegisterController::class)->name('register.store');