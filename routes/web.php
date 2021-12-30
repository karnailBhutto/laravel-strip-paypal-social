<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StripePaymentController;
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
	return view('paywithpaypal');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'admin','middleware' => 'auth','prefix' => 'admin'], function(){

	Route::get('/', [App\Http\Controllers\backend\AdminController::class, 'index'])->name('admin');
		Route::resource('transaction', App\Http\Controllers\backend\TransactionController::class);
	Route::resource('users', App\Http\Controllers\backend\UserController::class);
	Route::resource('payment', App\Http\Controllers\backend\PaymentController::class);
	Route::resource('profile', App\Http\Controllers\backend\ProfileController::class);

});
Route::get('google', [App\Http\Controllers\SocialiteAuthController::class, 'googleRedirect'])->name('auth/google');
Route::get('/auth/google-callback', [App\Http\Controllers\SocialiteAuthController::class, 'loginWithGoogle']);

Route::get('stripe', [StripePaymentController::class, 'stripe']);
Route::post('stripe', [StripePaymentController::class, 'stripePost'])->name('stripe.post');


// Route::get('paywithpaypal', array('as' => 'paywithpaypal','uses' => 'PaypalController@payWithPaypal',));
// Route::post('paypal', array('as' => 'paypal','uses' => 'PaypalController@postPaymentWithpaypal',));
// Route::get('paypal', array('as' => 'status','uses' => 'PaypalController@getPaymentStatus',));


Route::get('paywithpaypal', [App\Http\Controllers\PaypalController::class, 'payWithPaypal'])->name('paywithpaypal');
Route::post('paypal', [App\Http\Controllers\PaypalController::class, 'postPaymentWithpaypal'])->name('paypal');
Route::get('paypal', [App\Http\Controllers\PaypalController::class, 'getPaymentStatus'])->name('status');