<?php

use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatGPTController;
use App\Http\Controllers\CheckoutController;

//login
Route::get('/login', [FrontendController::class, 'show_login'])->name('login');
Route::post('/check_login', [FrontendController::class, 'check_login']);

//Admin
Route::middleware('auth')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', function () {
            return view('admin.home');
        });
    });
});



//product
Route::post('/admin/product/add', [ProductController::class, 'insert_product']);
Route::get('/admin/product/create', [ProductController::class, 'add_product']);
Route::get('/admin/product/list', [ProductController::class, 'list_product']);
Route::get('/admin/product/delete', [ProductController::class, 'delete_product']);
Route::get('/admin/product/edit/{id}', [ProductController::class, 'edit_product']);
Route::post('/admin/product/edit/{id}', [ProductController::class, 'update_product']);






//order
Route::get('/admin/order/list', [OrderController::class, 'list_order']);
Route::get('/admin/order/detail/{order_detail}', [OrderController::class, 'detail_order']);
Route::get('/admin/order/delete', [OrderController::class, 'delete_order']);

Route::post('/momo_payment', [CheckoutController::class, 'momo_payment']);
Route::post('/vnpay_payment', [CheckoutController::class, 'vnpay_payment']);

//upload
Route::post('/upload', [UploadController::class, 'uploadImage']);
Route::post('/uploads', [UploadController::class, 'uploadImages']);

//frontend
Route::get('/', [FrontendController::class, 'index']);
Route::get('/product/{id}', [FrontendController::class, 'show_product_id'])->where('id', '[0-9]+');
Route::get('/product/{brand}', [FrontendController::class, 'show_product_brand'])->where('brand', '[\p{L}\p{N}\s\-]+');
Route::get('/order/confirm/{id}', [FrontendController::class, 'confirm_order']);
Route::get('/order/token/check', [OrderController::class, 'check_order_token']);
Route::get('/order/success', [FrontendController::class, 'success_order']);

//cart
Route::post('/cart/add', [FrontendController::class, 'add_cart']);
Route::get('/cart', [FrontendController::class, 'show_cart']);
Route::get('/cart/delete/{id}', [FrontendController::class, 'delete_cart']);
Route::post('/cart/update', [FrontendController::class, 'update_cart']);
Route::post('/cart/send', [FrontendController::class, 'send_cart']);
