<?php

namespace App\Http\Controllers\API\Products;

use App\Actions\Products\GetStoreFrontProductsAction;
use App\Data\GetStoreFrontData;
use App\Http\Controllers\Controller;

use App\Http\Requests\Products\GetStoreFrontRequest;
use Illuminate\Http\JsonResponse;

class GetStoreFrontProductsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(GetStoreFrontRequest $request): JsonResponse
    {
        $data = GetStoreFrontData::from($request->validated());
        $limit = $data->limit;
 
        return new JsonResponse(GetStoreFrontProductsAction::run($limit));
    }
}
