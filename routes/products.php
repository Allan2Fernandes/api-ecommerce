<?php

use App\Http\Controllers\API\Products\GetProductController;
use App\Http\Controllers\API\Products\GetStoreFrontProductsController;

Route::prefix('products')
->group(function () {
    Route::middleware(['auth:sanctum', 'token-extension'])->group(function () {
        Route::get('store-front', GetStoreFrontProductsController::class);
        Route::get('/{productId}', GetProductController::class);
    });
});