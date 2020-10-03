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
        'name', 'email', 'password', 'profile_id', 'cpf'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function accounts()
    {
        return $this->hasMany(Account::class);
    }
}
