<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('me', App\Http\Controllers\MeController::class)->name('me.index');
});