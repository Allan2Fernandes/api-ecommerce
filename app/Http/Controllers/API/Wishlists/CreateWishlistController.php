<?php

namespace App\Http\Controllers\API\Wishlists;

use App\Actions\Wishlists\CreateWishlistAction;
use App\Data\CreateWishlistData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Wishlists\CreateWishlistRequest;
use DB;
use Illuminate\Http\JsonResponse;
use Log;

class CreateWishlistController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(CreateWishlistRequest $request): JsonResponse
    {
        $data = CreateWishlistData::from(array_merge($request->validated(), ['user_id' => $request->user()->id]));
        DB::beginTransaction();
        $wishlist = CreateWishlistAction::run($data);
        DB::commit();
        return new JsonResponse($wishlist);
    }
}
