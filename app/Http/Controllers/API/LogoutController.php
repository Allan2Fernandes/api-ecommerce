<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\LogoutUserRequest;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function __invoke(LogoutUserRequest $request) {
        $request->user()->tokens()->delete();
        return response()->json(['message' => 'Logged out successfully']);
    }
}