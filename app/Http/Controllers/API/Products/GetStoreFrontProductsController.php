<?php

namespace App\Http\Controllers\API\Products;

use App\Actions\Products\GetStoreFrontProductsAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\products\GetProductsRequest;
use Illuminate\Http\JsonResponse;

class GetStoreFrontProductsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(GetProductsRequest $request): JsonResponse
    {
        return new JsonResponse(GetStoreFrontProductsAction::run());
    }
}
