<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Rules\AvailabelValue;
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
        Validator::make(request()->all(), [
            'value'        => ['required', 'integer', new AvailabelValue],
        ])->validate();

        try {
            auth('api')->user()->accounts()->where('type', Account::SAVINGS)
                       ->decrement('value', request()->value);

            return response()->json(['message' => Message::successWithdraw()]);

        }
        catch(Exception $error)
        {
            return response()->json(['message' => Message::failedWithdraw()], 500);
        }
    }

    public function deposit()
    {
        Validator::make(request()->all(), [
            'agency'       => ['required', 'integer'],
            'number'       => ['required', 'integer'],
            'name'         => ['required', 'string'],
            'cpf'          => ['required', 'integer'],
            'value'        => ['required', 'integer'],
        ])->validate();

        $account = Account::searchAccountByNumberAndAgency()->getNameAndCpfFromUser()->first();

        if(!$account)
        {
            return response()->json(['message' => Message::nonAccountExist()], 400);
        }

        try
        {
            $account->increment('value', request()->value);
            return response()->json(['message' => Message::successDeposit()]);
        }

        catch(Exception $error)
        {
            return response()->json(['message' => Message::failedDeposit()], 500);
        }
    }
}
