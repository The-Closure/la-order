<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Restaurant\MealController;
use App\Http\Controllers\Customer\AddressController;
use App\Http\Controllers\Delivery\AddressController as DeliveryAddressController;
use App\Http\Controllers\restaurant\AddressController as RestaurantAddressController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Customer\OrderController;
use App\Http\Controllers\Customer\RestaurantController;
use App\Http\Controllers\restaurant\RestaurantsController;
use App\Http\Controllers\Restaurant\OrderController as RestaurantOrderController;
use App\Http\Controllers\Admin\AdminRestaurantController;
use App\Http\Controllers\Admin\AdminMealsController;
use App\Http\Controllers\Customer\MealController as CustomerMealController;
use App\Http\Controllers\Customer\OrderStatusController as CustomerOrderStatusController;
use App\Http\Controllers\Delivery\DeliveryController;
use App\Http\Controllers\delivery\OrderAreaController;
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
Route::get('/restaurants/{rest_id}/category/{cat_id}', [CustomerMealController::class, 'index'])->name('restaurants.meals');

Route::group(['prefix' => '/customer', 'middleware' => ['role:customer']], function () {
    Route::resource('orders', OrderController::class)->only(['index', 'show', 'store', 'create']);
    Route::resource('addresses', AddressController::class, [
        'names' => [
            'create' => 'customeraddcreate',
            'store' => 'customeraddstore',
        
        ]]);
    // Route::resource('customers', CustomerController::class);
    Route::post('orders/{order}/cancel', [CustomerOrderStatusController::class, 'update'])->name('order.cancel');
});

Route::group(['prefix' => '/restaurant', 'middleware' => ['role:owner']], function () {
    Route::resource('restaurant.orders', RestaurantOrderController::class)->except('index');
    Route::get('/{restaurant_id}/orders', [RestaurantOrderController::class, 'index']);
    Route::resource('addresses', RestaurantAddressController::class, [
        'names' => [
            'create' => 'owneraddcreate',
            'store' => 'owneraddstore',
        
        ]]);
    Route::resource('restaurants', RestaurantsController::class);
    Route::resource('restaurantmeals', MealController::class);
});

Route::group(['prefix' => '/delivery', 'middleware' => ['role:delivery']], function () {
    Route::get('/showorder',[DeliveryController::class,'my_order_items']);
    Route::post('/store',[DeliveryController::class,'store'])->name('delvierystore');
    Route::get('/edit/{delivery}',[DeliveryController::class,'edit'])->name('deliveryedit');
    Route::get('/show/{delivery}',[DeliveryController::class,'show'])->name('delivery.show');
    Route::put('/{delivery}/update',[DeliveryController::class,'update'])->name('delivery.update');
    Route::view('/deliverycompleteregister', 'delivery.deliverycompleteregister');
    Route::post('/deliverycompleteregister', [DeliveryController::class,'store'])->name('deliverycompleteregister');
    Route::get('/order/{id}/done', [OrderStatusController::class, 'markAsDone'])->name('markAsDone');
    Route::get('/order/{id}/accept', [OrderStatusController::class, 'markAsAccepted'])->name('markAsAccepted');
    Route::get('/orders', [OrderAreaController::class, 'index'])->name('allOrders');
    Route::resource('addresses', DeliveryAddressController::class, [
        'names' => [
            'create' => 'deliveryaddcreate',
            'store' => 'deliveryaddstore',
        
        ]]);
});

Route::group(['prefix' => '/admin', 'middleware' => ['role:admin']], function () {
    Route::resource('meals', AdminMealsController::class);
    Route::resource('restaurant', AdminRestaurantController::class);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
