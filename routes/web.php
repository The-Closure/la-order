<?php

use Illuminate\Support\Facades\Route;
use App\Http\controller\CategoryController;
use App\Http\controller\delivery\DeliveryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::prefix('/customer')->group(function () {
    Route::resource('orders', OrderController::class)->only(['index', 'show']);
});
Route::prefix('/Restaurant')->group(function () {
    Route::resource('orders', OrderController::class)->except('index');
    Route::get('/{restaurant_id}/orders', [OrderController::class, 'index']);

});
Route::group(['prefix'=>'delivery','namespace'=>'delivery', 'middleware' => 'auth'],function(){
    Route::get('/index',[DeliveryController::class,'my_order_items']);
    Route::get('/show',[DeliveryController::class,'show']);
    Route::get('/update',[DeliveryController::class,'update']);
});


require __DIR__.'/auth.php';
