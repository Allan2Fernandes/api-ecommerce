<?php

use App\Http\Controllers\API\Categories\GetCategoriesController;

Route::prefix('categories')
->group(function () {
    Route::middleware(['auth:sanctum', 'token-extension'])->group(function () {
        Route::get('', GetCategoriesController::class);
        
    });
});