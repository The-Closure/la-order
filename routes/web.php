<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Restaurant\MealController;
use App\Http\Controllers\Customer\AddressController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Customer\OrderController;
use App\Http\Controllers\Customer\RestaurantController;
use App\Http\Controllers\Restaurant\OrderController as RestaurantOrderController;
use App\Http\Controllers\Admin\AdminRestaurantController;
use App\Http\Controllers\Admin\AdminMealsController;
use App\Http\Controllers\Delivery\DeliveryController;
use App\Http\Controllers\Delivery\OrderStatusController;

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

Route::get('/', [RestaurantController::class, 'index'])->name('home');
Route::resource('restaurants', RestaurantController::class)->only('show');

Route::group(['prefix' => '/customer', 'middleware' => 'auth'], function () {
    Route::resource('orders', OrderController::class)->only(['index', 'show']);
    Route::resource('customers.addresses', AddressController::class);
    Route::resource('customers', CustomerController::class);
    Route::post('customer/order/{id}/cancel', [OrderStatusController::class, 'update']);
});

Route::group(['prefix' => '/restaurant', 'middleware' => 'auth'], function () {
    Route::resource('orders', RestaurantOrderController::class)->except('index');
    Route::get('/{restaurant_id}/orders', [RestaurantOrderController::class, 'index']);
    Route::resource('restaurantmeals', MealController::class);
});

Route::group(['prefix' => '/delivery', 'middleware' => 'auth'], function () {
    Route::get('/showorder',[DeliveryController::class,'my_order_items']);
    Route::post('/store',[DeliveryController::class,'store'])->name('delvierystore');
    Route::get('/show/{id}',[DeliveryController::class,'show'])->name('delvieryshow');
    Route::get('/edit/{id}',[DeliveryController::class,'edit'])->name('deliveryedit');
    Route::get('/update',[DeliveryController::class,'update']);
    Route::view('/deliverycompleteregister', 'delivery.deliverycompleteregister');
    Route::post('/deliverycompleteregister', [DeliveryController::class,'store'])->name('deliverycompleteregister');
    Route::get('/order/{id}/done', [OrderStatusController::class, 'markAsDone']);
});

Route::group(['prefix' => '/admin', 'middleware' => 'auth'], function () {
    Route::resource('meals', AdminMealsController::class);
    Route::resource('restaurant', AdminRestaurantController::class);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
