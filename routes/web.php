<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductDetailController;
use App\Http\Controllers\Auth\ForgotPasswordController;
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
Route::get('change-pass', function(){
    return view('auth.pass-change');
});

// Home
Route::get('/', [HomeController::class, 'showHome'])->name('home');
Route::get('product-detail', [ProductDetailController::class, 'showProductDetail'])->name('product-detail');
Route::get('checkout', [CheckoutController::class, 'showCheckout'])->name('checkout.show');

