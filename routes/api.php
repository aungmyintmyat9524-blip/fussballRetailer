<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');




Route::get('/index', function (Request $request) {
    return response()->json([
        'id' => 1,
        'name' => 'Nike Mercurial Boots',
        'price' => 120,
        'image_url' => asset('images/boot.jpg') // existing image in public/images
    ]);
});




Route::get('/myacc', function (Request $request) {
    return "hello";
});



// Route::get('/register', function (Request $request) {
//     return "hello";
// });



Route::post('/register', [UsersController::class, 'register']);

Route::post('/login', [UsersController::class, 'login']);



Route::post('/products', [UsersController::class, 'store']);
Route::get('/products', [UsersController::class, 'index']);


