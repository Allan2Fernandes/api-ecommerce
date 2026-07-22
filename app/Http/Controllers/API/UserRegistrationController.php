<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use App\Data\RegisterUserData;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class UserRegistrationController extends Controller
{
    public function __invoke(RegisterUserRequest $request): JsonResponse
    {
        $data = RegisterUserData::from($request->validated());
        User::create(array_merge($data->toArray(), ['id' => (string)Str::uuid()]));

        return response()->json(['message' => 'User registered successfully']);
    }
}