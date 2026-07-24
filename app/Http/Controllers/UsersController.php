<?php

namespace App\Http\Controllers;
use App\Models\UsersReg;
use App\Models\Products;
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
         $token = $user->createToken('kickstore')->plainTextToken;

if ($user && $isChecked) {
    return response()->json([
    'isSuccessful' => true,
    'token'   => $token,
    'user'    => $user
]);
} else {
    return ["isSuccessful"=>false];
}
    }


    public function store(Request $request)
{
    $request->validate([
        'name'  => 'required|string|max:255',
        'price' => 'required|numeric',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
    ]);

    $imagePath = null;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('products', 'public');
    }

    $product = Products::create([
        'name'  => $request->name,
        'price' => $request->price,
        'image' => $imagePath
    ]);

    return response()->json([
        'isSuccessful' => true,
        'product' => $product,
        'image_url' => $imagePath ? asset('storage/'.$imagePath) : null
    ]);
}


 function index (Request $request) {
    return response()->json([
        [
            'id' => 1,
            'name' => 'Nike Mercurial Boots',
            'price' => 120,
            'image_url' => asset('images/boot.jpg')
        ],
        [
            'id' => 2,
            'name' => 'Argentina Jersey',
            'price' => 50,
            'image_url' => asset('images/jersey.jpg')
        ],
        [
            'id' => 3,
            'name' => 'Match Football',
            'price' => 60,
            'image_url' => asset('images/ball.jpg')
        ]]);
        
        }


}