<?php

use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Order\OrderController;
use App\Http\Controllers\Products\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


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


Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/vendas', [OrderController::class, 'index'])->name('order.index');
    Route::get('/clientes', [CustomerController::class, 'index'])->name('customer.index');
    Route::get('/produtos', [ProductController::class, 'index'])->name('products.index');
    Route::post('/newLogout', [LogoutController::class, 'logout'])->name('newLogout');
});


