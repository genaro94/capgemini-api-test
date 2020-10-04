<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function balance()
    {
        $balance = auth('api')->user()->getTotalBalanceAccount();
        return response()->json(['balance' => $balance]);
    }
}
