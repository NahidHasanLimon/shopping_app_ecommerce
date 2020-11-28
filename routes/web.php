<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'Frontend\HomeController@index')->name('home');
Route::get('/add-to-cart', 'CartController@add_to_cart')->name('cart.add');
Route::get('/remove-from-cart', 'CartController@remove')->name('cart.remove');
Route::get('/cart', 'CartController@index')->name('cart.view');

// https://webmobtuts.com/backend-development/creating-a-shopping-cart-with-laravel/