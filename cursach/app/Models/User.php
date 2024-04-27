<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'nickname', 'last_name', 'first_name',
    ];

    protected $hidden = [
        'password', 'remember_token', 'is_admin'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
