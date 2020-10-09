<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable, SoftDeletes;

    const CLIENT        = 1;
    const MANAGER       = 2;
    const ADMINISTRATOR = 3;
    const SUPPORT       = 4;

    protected $fillable = [
        'name', 'email', 'password', 'profile_id', 'cpf', 'phone'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
    * Get the identifier that will be stored in the subject claim of the JWT.
    */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
    * Return a key value array, containing any custom claims to be added to the JWT.
    */
    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
    * relations
    */
    public function accounts()
    {
        return $this->hasMany(Account::class);
    }

    /**
     * mutators
    */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    /**
    *  functions
    */
    public function getTotalBalanceAccount()
    {
        return $this->accounts()->where('type', Account::SAVINGS)
                                ->pluck('value')
                                ->sum();
    }
}
