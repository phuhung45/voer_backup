<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class VprUser extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'auth_user';
    public $timestamps = false;
    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'email',
        'password',
        'is_active',
        'is_staff',
        'is_superuser',
        'last_login',
        'date_joined'
    ];
    
}
