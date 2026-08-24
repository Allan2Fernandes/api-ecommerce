<?php

use App\Http\Controllers\API\Wishlists\GetWishlistsController;

Route::prefix('wishlists')
->group(function () {
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/', GetWishlistsController::class);
    });
});