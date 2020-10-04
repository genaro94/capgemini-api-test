<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BalanceController extends Controller
{
    public function index()
    {
        $balance = auth('api')->user()->getTotalBalanceAccount();
        return response()->json(['balance' => $balance]);
    }
}
