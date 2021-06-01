<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

//http://localhost/laravel/laravel8/public/api
Route::get('/', function () {
    return "Hello World Date: ". now();
});

//http://localhost/laravel/laravel8/public/api/staff
Route::get('/staff', function () {
    return "Hello Staff";
});

//http://localhost/laravel/laravel8/public/api/staff
Route::get('/staff/{id}', function ($id) {
    return "Hello Staff id: " . $id;
});