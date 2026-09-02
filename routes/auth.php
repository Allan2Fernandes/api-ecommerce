<?php

use App\Http\Controllers\API\LogoutController;
use App\Http\Controllers\API\UserRegistrationController;
use App\Http\Controllers\API\LoginController;

Route::prefix('auth')
->group(function () {
    Route::post('register', UserRegistrationController::class);
    Route::post('login', LoginController::class);

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('logout', LogoutController::class);
    });
});