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

    /**
    * relations
    */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
    * functions
    */
    public function scopeSearchForAccountData($query)
    {
        return $query->where('number', request()->get('number'))
                     ->where('agency', request()->get('agency'));
    }

    public function scopeGetNameFromUser($query)
    {
        return $query->whereHas('user', function($query){
                return $query->where('name', 'LIKE', '%'.request()->get('name').'%');
            });
    }

    public function scopeGetCpfFromUser($query)
    {
        return $query->whereHas('user', function($query){
            return $query->where('cpf', request()->get('cpf'));
        });
    }
}
