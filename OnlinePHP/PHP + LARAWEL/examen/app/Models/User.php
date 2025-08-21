<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements AuthenticatableContract
{
    use Notifiable;

    protected $fillable = ['username', 'userpass', 'userstatus'];

    protected $hidden = ['userpass']; 

    public function getAuthPassword()
    {
        return $this->userpass;
    }
}