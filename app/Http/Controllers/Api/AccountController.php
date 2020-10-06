<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Services\Message;
use App\Models\Account;
use Exception;

class AccountController extends Controller
{
    public function balance()
    {
        $balance = auth('api')->user()->getTotalBalanceAccount();
        return response()->json(['balance' => $balance]);
    }

    public function withdraw()
    {
        $validator = Validator::make(request()->all(), [
            'value'        => ['required', 'integer'],
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors(), 'status' => 400], 400);
        }

        if($this->isNonDebitable(request()->value))
        {
            return response()->json([
                'status'    => 400,
                'message'   => Message::insufficientAmountForWithdraw()
            ], 400);
        }

        try {
            auth('api')->user()->accounts()->where('type', Account::SAVINGS)
                       ->decrement('value', request()->value);

            return response()->json([
                'status'    => 200,
                'message'   => Message::successWithdraw()
            ], 200);

        } catch(Exception $error)
        {
            return response()->json([
                'status'    => 500,
                'message'   => Message::failedWithdraw()
            ], 500);
        }
    }

    public function isNonDebitable($value)
    {
        $balance        = $this->removeMask(auth('api')->user()->getTotalBalanceAccount());
        $ammountToDebit = $this->removeMask($value);

        if($ammountToDebit > $balance) return true;
        return false;
    }

    public function removeMask($value){
        return str_replace("R$ ", "", str_replace(".", "", str_replace(",", ".", $value) ) );
    }
}
