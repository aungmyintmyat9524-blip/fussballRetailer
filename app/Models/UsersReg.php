<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;   // 👈 import this
use Illuminate\Notifications\Notifiable; // optional, if you want notifications
use Illuminate\Foundation\Auth\User as Authenticatable; // 👈 use Authenticatable instead of plain Model
class UsersReg extends Authenticatable
{
    //
     use HasApiTokens, Notifiable;
    protected $fillable = [
        'firstname', 'lastname', 'email', 'phone','password'
    ];
}
