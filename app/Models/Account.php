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

    public function accountHistories()
    {
        return $this->hasMany(accountHistory::class);
    }

    /**
    * acessors
    */
    public function getNumberAttribute()
    {
        return substr($this->number, 0, 2).'.'.substr($this->number, 2, 3)
               .'-'.substr($this->number, 5, 1);
    }

    public function getAgencyAttribute()
    {
        return substr($this->agency, 0, 4).'-'.substr($this->agency, 4, 1);
    }

    /**
    * mutators
    */
    public function setNumberAttribute($value)
    {
        $this->attributes['number'] = preg_replace("/[^0-9]/","", $value);
    }

    public function setAgencyAttribute($value)
    {
        $this->attributes['agency'] = preg_replace("/[^0-9]/","", $value);
    }
}
