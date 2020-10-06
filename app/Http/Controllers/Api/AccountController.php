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
        return response()->json(['balance' => auth('api')->user()->getTotalBalanceAccount()]);
    }

    public function withdraw()
    {
        $validator = Validator::make(request()->all(), [
            'value'        => ['required', 'integer'],
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 400);
        }

        if(request()->value > auth('api')->user()->getTotalBalanceAccount())
        {
            return response()->json(['message' => Message::insufficientAmountForWithdraw()], 400);
        }

        try {
            auth('api')->user()->accounts()->where('type', Account::SAVINGS)
                       ->decrement('value', request()->value);

            return response()->json(['message' => Message::successWithdraw()], 200);

        }
        catch(Exception $error)
        {
            return response()->json(['message' => Message::failedWithdraw()], 500);
        }
    }

    public function deposit()
    {
        $validator = Validator::make(request()->all(), [
            'agency'       => ['required', 'integer'],
            'number'       => ['required', 'integer'],
            'name'         => ['required', 'string'],
            'cpf'          => ['required', 'integer'],
            'value'        => ['required', 'integer'],
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 400);
        }

        $account = Account::searchForAccountData()->getNameFromUser()->getCpfFromUser()->first();

        if(!$account)
        {
            return response()->json(['message' => Message::nonAccountExist()], 400);
        }

        try
        {
            $account->increment('value', request()->value);
            return response()->json(['message' => Message::successDeposit()], 200);
        }

        catch(Exception $error)
        {
            return response()->json(['message' => Message::failedDeposit()], 500);
        }
    }
}
