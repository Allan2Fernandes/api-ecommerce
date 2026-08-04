<?php

namespace App\Http\Controllers\API\Products;

use App\Actions\GetProductAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Products\GetProductRequest;
use Illuminate\Http\JsonResponse;

class GetProductController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(GetProductRequest $request, string $productId): JsonResponse
    {
        return new JsonResponse(GetProductAction::run($productId));
    }
}
