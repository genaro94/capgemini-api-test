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

    const PERMISSIONS = [
        1 => 'Client',
        2 => 'Manager',
        3 => 'Administrator',
        4 => 'Support'
    ];

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
    *
    * @return mixed
    */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
    * Return a key value array, containing any custom claims to be added to the JWT.
    *
    * @return array
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
    * acessors
    */
    public function getCpfAttribute()
    {
        return substr($this->cpf, 0, 3).'.'.substr($this->cpf, 3, 3).'.'.
               substr($this->cpf, 6, 3).'-'.substr($this->cpf, 8, 2);
    }

    public function getPhoneAttribute()
    {
        return '('.substr($this->phone, 0, 2).') '.
                substr($this->phone, 2, 5).'-'.substr($this->phone, 7, 4);
    }

    /**
     * mutators
    */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function setCpfAttribute($value)
    {
        $this->attributes['cpf'] = preg_replace("/[^0-9]/","", $value);
    }

    public function setPhoneAttribute($value)
    {
        $this->attributes['phone'] = preg_replace("/[^0-9]/","", $value);
    }
}
