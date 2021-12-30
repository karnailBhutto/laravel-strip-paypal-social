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




APP_NAME=MyLaravel
APP_ENV=local
APP_KEY=base64:jXwAW7P+YNZMK/qbouztnlPX0QskQ4iqksu9/x79HYU=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=localhost;unix_socket=/Applications/MAMP/tmp/mysql/mysql.sock
DB_PORT=3306
DB_DATABASE=laravel-payment
DB_USERNAME=root
DB_PASSWORD=

BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"

STRIPE_KEY=pk_test_51JxWseSGmY9vKrAFIbO4zKr0TKA1k2QKRUwiyfi0mHHaEmTVCWpxuLLXoEScCqTsJp6v3S20NpmrMNkV1fIxgIlP00LmE53PNe

STRIPE_SECRET=sk_test_51JxWseSGmY9vKrAF83tu4fVbk90QgRXOBjSLL3VBRP9KSFNCVSl786IExIEObLl0BH22fOyfdaD5BBdbgyRATp7b00P3jSavrz


PAYPAL_MODE=sandbox
PAYPAL_SANDBOX_API_USERNAME=sb-iiybw8259847_api1.business.example.com
PAYPAL_SANDBOX_API_PASSWORD=NAUHK7ABM3NX8DJ3
PAYPAL_SANDBOX_API_SECRET=EB5Eb3FJYuAE4mkAgzgx5WGf9ySiHX9jh4L0azWT3lGYWArpwAqSVRKZgLLnl1D-4DrBugETohr9-Spe
PAYPAL_CURRENCY=INR
PAYPAL_SANDBOX_API_CERTIFICATE=AVVud-EtIEFbb2Vdd5rXd6m25DBAAyTZvIOTf32NVwwgDPxMEwf6DCii
