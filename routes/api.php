<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CompanyController;
use App\Http\Controllers\API\ProductController;

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
Route::get('/', [CompanyController::class, 'index']);

//http://localhost/laravel/laravel8/public/api/staff
Route::get('/staff', function () {
    return "Hello Staff";
});

//http://localhost/laravel/laravel8/public/api/staff
Route::get('/staff/{id}', [CompanyController::class, 'show']);

Route::apiResource('/product', ProductController::class);