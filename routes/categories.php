<?php

use App\Http\Controllers\API\Categories\GetCategoriesController;


Route::prefix('categories')
->group(function () {
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('', GetCategoriesController::class);
        
    });
});