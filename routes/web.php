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

Route::resource('\categories',CategoryController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group(['prefix'=>'delivery','namespace'=>'delivery'],function(){
    Route::view('/index', 'order')->name('my_order');
});


require __DIR__.'/auth.php';
