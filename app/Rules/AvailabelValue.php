<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class AvailabelValue implements Rule
{

    public function passes($attribute, $value)
    {
        return auth('api')->user()->getTotalBalanceAccount() > $value;
    }

    public function message()
    {
        return 'O valor do saque precisar ser menor que o saldo disponível.';
    }
}
