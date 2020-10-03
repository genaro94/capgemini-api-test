<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Services\Message;

class AuthController extends Controller
{
    public function login() {

        $validator = Validator::make(request()->all(), [
            'email'              => 'required|string',
            'password'           => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors(), 'status' => 400], 400);
        }

        if (!$token  = auth('api')->attempt(request()->all())) {
            return response()->json([
                'status'  => 401,
                'message' => Message::invalidAccess()
            ], 401);
        }

        return response()->json([
            'status' => 200,
            'token'  => $token
        ], 200);
    }

    public function logout(){

        auth('api')->invalidate(true);

        return response()->json([
            'status'    => 200,
            'message'   => Message::logoutAccount()
        ], 200);
    }
}
