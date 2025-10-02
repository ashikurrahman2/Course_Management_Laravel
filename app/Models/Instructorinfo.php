<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Instructorinfo extends Authenticatable
{
        use Notifiable;

    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'password',
        'bio',
    ];

        protected $hidden = [
        'password',
    ];

}
