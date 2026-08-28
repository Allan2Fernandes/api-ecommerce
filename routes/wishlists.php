<?php

use App\Http\Controllers\API\Wishlists\DeleteWishlistController;
use App\Http\Controllers\API\Wishlists\GetWishlistsController;

Route::prefix('wishlists')
->group(function () {
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/', GetWishlistsController::class);
        Route::delete('/{id}', DeleteWishlistController::class);
    });
});