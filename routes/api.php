<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');




Route::get('/index', function (Request $request) {
    return "hello";
});




Route::get('/myacc', function (Request $request) {
    return "hello";
});



// Route::get('/register', function (Request $request) {
//     return "hello";
// });



    Route::post('/register', [UsersController::class, 'register']);