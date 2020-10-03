<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
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
    * relations
    */
    public function accounts()
    {
        return $this->hasMany(Account::class);
    }

    /**
    * acessors
    */
    public function getCpfAttribute($value)
    {
        return substr($value, 0, 3).'.'.substr($value, 3, 3).'.'.substr($value, 6, 3).'-'.substr($value, 8, 2);
    }

    public function getPhoneAttribute($value)
    {
        return '('.substr($value, 0, 2).') '.substr($value, 2, 5).'-'.substr($value, 7, 4);
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
