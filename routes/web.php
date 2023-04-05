<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductDetailController;
use App\Http\Controllers\ShoppingCartController;
use Illuminate\Support\Facades\Route;

// Auth normal
Route::get('login', [LoginController::class, 'showLogin'])->name('login');
Route::post('login', [LoginController::class, 'handleLogin'])->name('login.post');
Route::get('sign-out', [LoginController::class, 'logout'])->name('logout');
Route::get('register', [RegisterController::class, 'showRegister'])->name('register');
Route::post('register', [RegisterController::class, 'handleRegister'])->name('register.post');
Route::get('forgot-password', [ForgotPasswordController::class, 'showForgotPassword'])->name('forgotpass');
Route::post('forgot-password', [ForgotPasswordController::class, 'handleForgotPassword'])->name('forgotpass.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPassword'])->name('reset.password.show');
Route::post('reset-password', [ForgotPasswordController::class, 'handleResetPassword'])->name('reset.password.post');
Route::get('test', [ShoppingCartController::class, 'getCartProduct']);
//Login facebook
Route::group(['controller' => \App\Http\Controllers\Auth\FacebookController::class], function() {
    Route::get('auth/facebook', 'redirectToFacebook')->name('login.facebook');
    Route::get('auth/facebook/callback', 'handleFacebookCallback');
});
// Home
Route::get('/', [HomeController::class, 'showHome'])->name('home');

Route::get('product-detail/{id?}', [ProductDetailController::class, 'showProductDetail'])->name('product-detail');
Route::post('choose-var', [ProductDetailController::class, 'chooseProduct'])->name('choose.product');
Route::get('get-product-variable', [ProductDetailController::class, 'getProductVariable'])->name('product.variable.show');

Route::middleware(['auth:customer'])->group(function (){
    Route::get('checkout', [CheckoutController::class, 'showCheckout'])->name('checkout.show');
    Route::post('validate-checkout', [CheckoutController::class, 'checkout'])->name('checkout.validate.post');

    Route::get('cart', [CartController::class, 'showCart'])->name('cart.show');

    Route::group(['controller' => ShoppingCartController::class], function () {
        Route::get('add-to-cart/{id}', 'addToCart')->name('add.to.cart');
        Route::get('change-quantity', 'update')->name('change.quantity');
        Route::post('remove-from-cart/{id}', 'removeProductFromCart')->name('remove.from.cart');
    });
});

// Route::fallback -> bạn có thể xác định 1 tuyến đường sẽ được thực hiện khi không có tuyến đường nào
// phù hợp với yêu cầu đến. Tức là 1 không tìm thấy đường dẫn tương ứng cái này sẽ chạy.
Route::fallback(function (){
    return abort('500');
});
