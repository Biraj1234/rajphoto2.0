<?php

namespace App\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class FrontendUser extends Authenticatable
{
    protected $table = 'frontend_users';
    protected $fillable = [
        'name', 'status',
    ];
}
