<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Model
{
    use SoftDeletes;

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
    public function scopeSearchAccountByNumberAndAgency($query)
    {
        return $query->where('number', request()->get('number'))
                     ->where('agency', request()->get('agency'));
    }

    public function scopeGetNameAndCpfFromUser($query)
    {
        return $query->whereHas('user', function($query){
                return $query->where('name', 'LIKE', '%'.request()->get('name').'%')
                             ->where('cpf', request()->get('cpf'));
            });
    }
}
