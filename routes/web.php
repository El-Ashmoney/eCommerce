<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\ContactMessageController;

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

Route::get('/', [HomeController::class, 'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/redirect', [HomeController::class, 'redirect'])->middleware('auth', 'verified');

Route::get('/view_category', [AdminController::class, 'view_category']);
Route::post('/add_category', [AdminController::class, 'add_category']);
Route::get('/delete_category/{id}', [AdminController::class, 'delete_category']);
Route::get('/view_product', [AdminController::class, 'view_product']);
Route::post('/add_product', [AdminController::class, 'add_product']);
Route::get('/show_product', [AdminController::class, 'show_product']);
Route::get('/update_product/{id}', [AdminController::class, 'update_product']);
Route::post('/update_product_confirm/{id}', [AdminController::class, 'update_product_confirm']);
Route::get('/delete_product/{id}', [AdminController::class, 'delete_product']);
Route::get('/delete_order/{id}', [AdminController::class, 'delete_order']);
Route::get('/product_details/{id}', [HomeController::class, 'product_details']);
Route::post('/add_cart/{id}', [HomeController::class, 'add_cart']);
Route::get('/show_cart', [HomeController::class, 'show_cart']);
Route::get('/remove_cart/{id}', [HomeController::class, 'remove_cart']);
Route::get('/cash_order', [HomeController::class, 'cash_order']);
Route::get('/stripe/{total_price}', [HomeController::class, 'stripe']);
Route::post('stripe/{total_price}', [HomeController::class, 'stripePost'])->name('stripe.post');
Route::get('/order', [AdminController::class, 'order']);
Route::get('/deliver_order/{id}', [AdminController::class, 'deliver_order']);
Route::get('/download_pdf/{id}', [AdminController::class, 'download_pdf']);
Route::get('/send_email/{id}', [AdminController::class, 'send_email']);
Route::post('/send_user_email/{id}', [AdminController::class, 'send_user_email']);
Route::get('/search_data', [AdminController::class, 'search_data']);
Route::get('/show_order', [HomeController::class, 'show_order']);
Route::get('/cancel_order/{id}', [HomeController::class, 'cancel_order']);
Route::get('/show_comments', [HomeController::class, 'show_comments']);
Route::post('/add_comment', [HomeController::class, 'add_comment']);
Route::post('/add_reply', [HomeController::class, 'add_reply']);
Route::get('/product_search', [HomeController::class, 'product_search']);
Route::get('/search_product', [AdminController::class, 'search_product']);
Route::get('/contact', [ContactMessageController::class, 'index']);
Route::post('/contact', [ContactMessageController::class, 'store']);
Route::get('/products', [HomeController::class, 'products']);
Route::get('/logout', [AdminController::class, 'logout']);
Route::get('/privacy_policy', [HomeController::class, 'privacy_policy']);

