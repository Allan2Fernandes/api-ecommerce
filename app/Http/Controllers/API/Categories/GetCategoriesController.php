<?php

namespace App\Http\Controllers\API\Categories;

use App\Actions\Categories\GetCategoriesAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Categories\GetCategoriesRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GetCategoriesController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(GetCategoriesRequest $request): JsonResponse
    {
        return new JsonResponse(GetCategoriesAction::run());
    }
}
