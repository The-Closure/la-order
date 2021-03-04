<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Customer\OrderController;

use App\Http\controller\CategoryController;
use App\Http\Controllers\restaurant\OrderController;

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
Route::prefix('/restaurant')->group(function () {
    Route::resource('orders', OrderController::class)->except('index');
    Route::get('/{restaurant_id}/orders', [OrderController::class, 'index']);

});

require __DIR__.'/auth.php';
