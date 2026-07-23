<?php

namespace App\Http\Controllers;
use App\Models\UsersReg;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    //
    function register(Request $request){
    $data = [
           'firstname' => $request->firstname,
            'lastname'  => $request->lastname,
            'email'     => $request->email,
            'phone'     => $request->phone,
            'password'  => bcrypt($request->password),   
        ];
        UsersReg::create($data);
        return $data;
    }
}
