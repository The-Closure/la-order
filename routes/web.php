<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\MealController;
use App\Http\controller\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderStatusController;


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

Route::resource('\categories',CategoryController::class);



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::prefix('/customer')->group(function () {
    Route::resource('orders', OrderController::class)->only(['index', 'show']);
});

Route::prefix('/customer')->group(function () {
    Route::resource('restaurants', RestaurantController::class)->only(['index', 'show'])->name("home");
});

Route::prefix('/restaurant')->group(function () {
    Route::get('/{restaurant_id}/orders', [OrderController::class, 'index']);
    Route::resource('restaurants', RestaurantController::class)->only(['index', 'show']);
});
Route::prefix('/restaurant')->group(function () {
    Route::resource('orders', RestaurantOrderController::class)->except('index');
    Route::get('/{restaurant_id}/orders', [RestaurantOrderController::class, 'index']);

});
Route::group(['prefix'=>'delivery','namespace'=>'delivery', 'middleware' => 'auth'],function(){
    Route::get('/index',[DeliveryController::class,'my_order_items']);
    Route::get('/show',[DeliveryController::class,'show']);
    Route::get('/update',[DeliveryController::class,'update']);
});

Route::prefix('/admin')->group(function () {
    Route::resource('restaurant', AdminRestaurantController::class);
});

require __DIR__.'/auth.php';
Route::get('/order', [OrderController::class, 'markAsDone'])->middleware('auth');
Route::resource('/customers/addresses', AddressController::class);
Route::resource('/customers', CustomerController::class);
Route::get('/order/{id}/done', [OrderController::class, 'markAsDone'])->middleware('auth');
