<?php

namespace App\Http\Controllers\API\Wishlists;

use App\Actions\Wishlists\EditWishlistAction;
use App\Data\EditWishlistData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Wishlists\EditWishlistRequest;
use DB;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EditWishlistController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(EditWishlistRequest $request, string $id): JsonResponse
    {
        DB::beginTransaction();
        $user = $request->user();
        $data = EditWishlistData::from(array_merge(['user_id' => $user->id], $request->validated()));
        $wishlist = EditWishlistAction::run($id, $data);
        DB::commit();

        return new JsonResponse($wishlist);
    }
}
