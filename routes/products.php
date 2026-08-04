<?php

use App\Http\Controllers\API\Products\GetStoreFrontProductsController;




Route::prefix('products')
->group(function () {
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('store-front', GetStoreFrontProductsController::class);
        
    });
});