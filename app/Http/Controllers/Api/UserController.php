<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Services\Message;
use Exception;

class UserController extends Controller
{
    public function index()
    {
        try{
            return response()->json(['user' => auth('api')->user()]);
        }
        catch(Exception $error){
            return response()->json(['message' => Message::failedUserDetails()], 500);
        }
    }
}
