<?php

namespace App\Http\Controllers\API\Wishlists;

use App\Actions\Wishlists\GetWishlistsAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GetWishlistsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): JsonResponse
    {
        $user = $request->user();
        return new JsonResponse(GetWishlistsAction::run($user->id));
    }
}
