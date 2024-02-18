<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class,"index"])->name("home.index");
Route::get('about-us', [HomeController::class,"about"])->name("home.about");
Route::get('category/{category}', [HomeController::class,"category"])->name("home.category");
Route::get('product/{product}', [HomeController::class,"product"])->name("home.product");
Route::get('favorite/{product}', [HomeController::class,"favorite"])->name("home.product.favorite");


Route::group(['prefix' => "account"],function(){
Route::get('/login', [AccountController::class,"login"])->name("account.login");
Route::get('/logout', [AccountController::class,"logout"])->name("account.logout");
Route::get('/verify-account/{email}', [AccountController::class,"verify"])->name("account.verify");
Route::post('/login', [AccountController::class,"check_login"])->name("account.check_login");

Route::get('/register', [AccountController::class,"register"])->name("account.register");
Route::post('/register', [AccountController::class,"check_register"])->name("account.check_register");

Route::group(['middleware'=> "customer"],function(){
Route::get('/wishlist', [AccountController::class,"wishlist"])->name("account.wishlist");

Route::get('/profile', [AccountController::class,"profile"])->name("account.profile");
Route::post('/profile', [AccountController::class,"check_profile"])->name("account.check_profile");

Route::get('/change-password', [AccountController::class,"change_password"])->name("account.change-password");
Route::post('/change-password', [AccountController::class,"check_change_password"])->name("account.check_change_password");

});

Route::get('/forgot-password', [AccountController::class,"forgot_password"])->name("account.forgot-password");
Route::post('/forgot-password', [AccountController::class,"check_forgot_password"])->name("account.check_forgot_password");

Route::get('/reset-password/{token}', [AccountController::class,"reset_password"])->name("account.reset-password");
Route::post('/reset-password/{token}', [AccountController::class,"check_reset_password"])->name("account.check_reset_password");
});

Route::group(['prefix'=> 'admin','middleware' => 'auth'],function(){
Route::get('', [AdminController::class,"index"])->name("admin.index");
Route::get('admin/logout', [AdminController::class,"logout"])->name("admin.logout");

Route::resource('category',CategoryController::class);

Route::resource('product',ProductController::class);

Route::group(['prefix' => 'order-manage','middleware' => 'auth'],function(){
Route::get('/',[AdminOrderController::class,"index"])->name("order-manage.index");
Route::get('/detail/{order}',[AdminOrderController::class,"detail"])->name("order-manage.detail");
});
Route::get('product-delete-image/{image}',[ProductController::class,'destroyImage'])->name("product.delete-image");
});
Route::get('admin/login', [AdminController::class,"login"])->name("admin.login");
Route::post('admin/login', [AdminController::class,"check_login"])->name("admin.check_login");


Route::group(['prefix' => "cart",'middleware' => 'customer'],function(){
    Route::get('', [CartController::class,"index"])->name("cart.index");
    Route::get('/add/{product}', [CartController::class,"add"])->name("cart.add");
    Route::get('/delete/{product}', [CartController::class,"delete"])->name("cart.delete");
    Route::get('/update/{product}', [CartController::class,"update"])->name("cart.update");
    Route::get('/clear', [CartController::class,"clear"])->name("cart.clear");

});

Route::group(['prefix' => "order",'middleware' => 'customer'],function(){
    Route::get('', [OrderController::class,"index"])->name("order.index");
    Route::get('/create', [OrderController::class,"create"])->name("order.create");
    Route::get('/history', [OrderController::class,"history"])->name("order.history");
    Route::get('/detail/{order}', [OrderController::class,"detail"])->name("order.detail");
    Route::post('/create', [OrderController::class,"post_create"])->name("order.post_create");

    Route::get('/add/{product}', [OrderController::class,"add"])->name("order.add");
    Route::get('/delete/{product}', [OrderController::class,"delete"])->name("order.delete");
    Route::get('/update/{product}', [OrderController::class,"update"])->name("order.update");
    Route::get('/clear', [OrderController::class,"clear"])->name("order.clear");
    Route::get('/verify/{token}', [OrderController::class,"verify"])->name("order.verify");

    Route::get('/checkout', [CheckoutController::class,"checkout"])->name("order.checkout");
    Route::post('/checkout', [CheckoutController::class,"post-checkout"])->name("order.post-checkout");


});
