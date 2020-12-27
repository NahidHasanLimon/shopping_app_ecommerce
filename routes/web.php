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
// Route::group(['middleware' => 'web'], function() {
Route::get('/', 'Frontend\HomeController@index')->name('home');
Route::get('/add-to-cart', 'CartController@add_to_cart')->name('cart.add');
Route::get('/remove-from-cart', 'CartController@remove')->name('cart.remove');
Route::get('/cart', 'CartController@index')->name('cart.view');
Route::post('/cart/update', 'CartController@update')->name('cart.update');
Route::post('/coupon/apply', 'CartController@apply_coupon')->name('coupon.apply');
Route::get('/coupon/remove/{coupon_code}', 'CartController@remove_coupon')->name('coupon.remove');
Route::get('/my-account', function () {
    return view('frontend.pages.my-account');
})->name('my-account');
// Route::get('/cart/update',function(){
// 	echo "limon";
// })->name('cartUpdateNew');


Route::get('/checkout', 'Frontend\CheckOutController@index')->name('checkout');
Route::post('/order/store', 'Frontend\OrderController@store')->name('order.store');

// https://webmobtuts.com/backend-development/creating-a-shopping-cart-with-laravel/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home2');
// Route::get('/cart2', function() {
//     Cart::details();
// });
// });
// https://appdividend.com/2018/04/11/laravel-google-login-tutorial/
Route::get('/redirect', 'SocialAuthController@redirect');
Route::get('/callback', 'SocialAuthController@callback');