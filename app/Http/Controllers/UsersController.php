<?php

namespace App\Http\Controllers;
use App\Models\UsersReg;
use Illuminate\Support\Facades\Hash;

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

    function login(Request $request){
        $user = UsersReg::where('email', $request->email)->first();
        $isChecked = Hash::check($request->password, $user->password);
        // return ["user"=>$user, "userpassword"=>$user->password, "isChecked"=>$isChecked];

if ($user && $isChecked) {
    return ["isSuccessful"=>true];
} else {
    return ["isSuccessful"=>false];
}
    }

}