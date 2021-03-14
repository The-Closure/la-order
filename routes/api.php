<?php

use App\Http\Controllers\Api\AuthenticationController;
use App\Http\Controllers\Api\RestaurantController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->group(function () {
});
Route::post('/login', [AuthenticationController::class, 'login']);

// Route::get('/restaurants', [RestaurantController::class, 'index']);
Route::resource('restaurants', RestaurantController::class);