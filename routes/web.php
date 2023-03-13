<?php

use App\Http\Controllers\Admin\ManageProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductDetailController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

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

// Auth
Route::get('login', [LoginController::class, 'showLogin'])->name('login');
Route::post('login', [LoginController::class, 'handleLogin'])->name('login.post');
Route::get('sign-out', [LoginController::class, 'logout'])->name('logout');
Route::get('register', [RegisterController::class, 'showRegister'])->name('register');
Route::post('register', [RegisterController::class, 'handleRegister'])->name('register.post');
Route::get('forgot-password', [ForgotPasswordController::class, 'showForgotPassword'])->name('forgotpass');
Route::post('forgot-password', [ForgotPasswordController::class, 'handleForgotPassword'])->name('forgotpass.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPassword'])->name('reset.password.show');
Route::post('reset-password', [ForgotPasswordController::class, 'handleResetPassword'])->name('reset.password.post');

// Home
Route::get('/', [HomeController::class, 'showHome'])->name('home');
Route::get('product-detail', [ProductDetailController::class, 'showProductDetail'])->name('product-detail');
Route::get('checkout', [CheckoutController::class, 'showCheckout'])->name('checkout.show');
Route::get('cart', [CartController::class, 'showCart'])->name('cart.show');
Route::post('choose-var', [ProductDetailController::class, 'chooseProduct'])->name('choose.product');
Route::post('validate-checkout', [CheckoutController::class, 'checkout'])->name('checkout.validate.post');

// Admin
Route::group(['prefix' => 'admin', 'middleware' => ['can:isAdmin']], function(){
    Route::get('manage-product', [ManageProductController::class, 'showManageProduct'])->name('admin.product.show');
    Route::get('add-product', [ManageProductController::class, 'showAddProduct'])->name('admin.product_add.show');
    Route::post('add-product', [ManageProductController::class, 'handleAddProduct'])->name('admin.product_add.post');
    Route::get('edit-product/{id}', [ManageProductController::class, 'showEditProduct'])->name('admin.product_edit.show');
    Route::post('edit-product/{id}', [ManageProductController::class, 'handleEditProduct'])->name('admin.product_edit.post');
    Route::post('delete-product/{id}', [ManageProductController::class, 'deleteProduct'])->name('admin.product_delete.post');
    Route::get('view-product/{id}', [ManageProductController::class, 'showViewProduct'])->name('admin.product_view.show');

    // Order
    Route::get('manage-order', [OrderController::class, 'showManageOrder'])->name('admin.order.show');
    Route::get('order-detail', [OrderController::class, 'showOrderDetail'])->name('admin.order_detail.show');
});
