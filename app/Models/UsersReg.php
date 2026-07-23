<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsersReg extends Model
{
    //
    protected $fillable = [
        'firstname', 'lastname', 'email', 'phone','password'
    ];
}
