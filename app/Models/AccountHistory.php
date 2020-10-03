<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AccountHistory extends Model
{
    use SoftDeletes;

    const TYPES = [
        1  => 'Deposit',
        2  => 'Withdraw',
        3  => 'Transfer'
    ];

    const DEPOSIT      = 1;
    const WITHDRAW     = 2;
    const TRANSFER     = 3;

    protected $fillable = [
        'account_id', 'operation_type', 'value'
    ];

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
