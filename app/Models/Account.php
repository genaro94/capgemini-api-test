<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Model
{
    use SoftDeletes;

    const TYPES = [
        1  => 'Savings',
        2  => 'Chain',
        3  => 'Salary'
    ];

    const SAVINGS       = 1;
    const CHAIN         = 2;
    const SALARY        = 3;

    protected $fillable = [
        'user_id', 'type', 'number', 'agency', 'value'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function accountHistories()
    {
        return $this->hasMany(accountHistory::class);
    }
}
