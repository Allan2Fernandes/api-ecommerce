<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthenticationController extends Controller
{
    public function userInfo(Request $request)
    {
        return response()->json($request->user());
    }
}