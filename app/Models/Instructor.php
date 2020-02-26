<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Instructor extends Authenticatable{
    use Notifiable;

    protected $guard = 'instructor';

    protected $fillable = [
        'name', 'lastname', 'email', 'dni', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
