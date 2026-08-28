<?php

namespace App\Http\Controllers\API\Wishlists;

use App\Actions\Wishlists\DeleteWishlistAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Wishlists\DeleteWishlistRequest;
use DB;
use Illuminate\Http\JsonResponse;

class DeleteWishlistController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(DeleteWishlistRequest $request, string $wishlist_id): JsonResponse
    {
        DB::beginTransaction();
        DeleteWishlistAction::run($wishlist_id);

        DB::commit();

        return new JsonResponse(null, 204);
    }
}
