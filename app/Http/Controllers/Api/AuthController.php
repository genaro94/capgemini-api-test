<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Services\Message;

class AuthController extends Controller
{
    public function login() {

        Validator::make(request()->all(), [
            'email'              => 'required|string',
            'password'           => 'required|string',
        ])->validate();

        if (!$token  = auth('api')->attempt(request()->all()))
        {
            return response()->json(['message' => Message::invalidAccess()], 401);
        }

        return response()->json([
            'token'  => $token
        ], 200);
    }

    public function logout(){

        auth('api')->invalidate(true);

        return response()->json(['message' => Message::logoutAccount()], 200);
    }
}
