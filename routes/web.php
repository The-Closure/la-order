<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\resturant\MealController;
use App\Http\Controllers\OrderControllerController;
use App\Http\Controllers\Customer\AddressController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\controllers\delivery\DeliveryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Customer\OrderController ;
use App\Http\Controllers\Customer\RestaurantController;
use App\Http\Controllers\restaurant\OrderController as RestaurantOrderController;
use App\Http\Controllers\Admin\AdminRestaurantController;
use App\Http\Controllers\Delivery\DeliveryController;

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

Route::resource('/categories',CategoryController::class);




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::prefix('/customer')->group(function () {
    Route::resource('orders', OrderController::class)->only(['index', 'show']);
});
Route::prefix('/restaurant')->group(function () {
    Route::resource('orders', OrderController::class)->except('index');
    Route::get('/{restaurant_id}/orders', [OrderController::class, 'index']);
    
});
Route::group(['prefix'=>'delivery','namespace'=>'delivery', 'middleware' => 'auth'],function(){
    Route::get('/index',[DeliveryController::class,'my_order_items']);
    Route::post('/store',[DeliveryController::class,'store'])->name('delvierystore');
    Route::get('/show/{id}',[DeliveryController::class,'show'])->name('delvieryshow');
    Route::get('/update',[DeliveryController::class,'update']);
    Route::view('/deliverycompleteregister', 'delivery.deliverycompleteregister');
    Route::post('/deliverycompleteregister', [DeliveryController::class,'store'])->name('deliverycompleteregister');
    Route::resource('restaurantmeals', MealController::class);
});
Route::prefix('/admin')->group(function () {
    Route::resource('/restaurant', AdminRestaurantController::class);
});
Route::prefix('/admin')->group(function () {
    Route::resource('/meals', AdminMealsController::class);
});

require __DIR__.'/auth.php';
Route::get('/order', [OrderController::class, 'markAsDone'])->middleware('auth');
Route::resource('/customers/addresses', AddressController::class);
Route::resource('/customers', CustomerController::class);
Route::get('/order/{id}/done', [OrderController::class, 'markAsDone'])->middleware('auth');
Route::resource('/address',AddressController::class);
