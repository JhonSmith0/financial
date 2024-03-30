<?php

namespace App\Domain\Auth\Routes;

use App\Domain\Auth\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('/')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/me', [AuthController::class, 'getMe'])->middleware('auth.jwt');
});
