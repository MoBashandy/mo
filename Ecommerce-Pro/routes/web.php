<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use Illuminate\Auth\Events\Verified;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [HomeController::class, 'index']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/AdminDashboard', [HomeController::class, 'AdminDashboard'])->name('dashboard');
});
// Admin Dashboard
// Route::get('/AdminDashboard',[HomeController::class,'AdminDashboard'])->middleware('auth','Verified');

// category
Route::get('/view_category',[AdminController::class,'view_category']);
Route::post('/add_category',[AdminController::class,'add_category']);
Route::get('/delete_cateory/{id}',[AdminController::class,'delete_cateory']);
// End category

// product
Route::get('/view_product',[AdminController::class,'view_product']);
Route::post('/add_product',[AdminController::class,'add_product']);
Route::get('/show_product',[AdminController::class,'show_product']);
Route::get('/delete_product/{id}',[AdminController::class,'delete_product']);
Route::get('/update_product/{id}',[AdminController::class,'update_product']);
Route::post('/update_product_confirm/{id}',[AdminController::class,'update_product_confirm']);
Route::get('/product_details/{id}',[HomeController::class,'product_details']);
// End product

// Cart
Route::post('/add_cart/{id}',[HomeController::class,'add_cart']);
Route::middleware(['auth'])->group(function () {
    Route::get('/show_cart', [HomeController::class, 'show_cart'])->name('show_cart');
});
Route::get('/remove_cart/{id}',[HomeController::class,'remove_cart']);
Route::get('/cash_order',[HomeController::class,'cash_order']);
// End Cart

// PAY
Route::get('/stripe/{total_price}',[HomeController::class,'stripe']);
Route::post('/stripe/{total_price}',[HomeController::class,'stripePost'])->name('stripe.post');
// End PAY

// Order
Route::get('/order',[AdminController::class,'order']);
Route::get('/delivered/{id}',[AdminController::class,'delivered']);
Route::get('/print_pdf/{id}',[AdminController::class,'print_pdf']);
Route::get('/send_email/{id}',[AdminController::class,'send_email']);
Route::post('/send_user_email/{id}',[AdminController::class,'send_user_email']);
Route:: get ('/search',[AdminController::class,'searchat']);
// End Order

// Order Home
Route::get('/show_order',[HomeController::class,'show_order']);
Route::get('/cancel_order/{id}',[HomeController::class,'cancel_order']);
// End Order Home

// Comments
Route::post('/comment',[HomeController::class,'comment']);
Route::post('/reply',[HomeController::class,'reply']);
