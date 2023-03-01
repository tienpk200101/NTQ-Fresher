<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\HomeController;
use App\Services\ForgotPasswordService;
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

// Auth
Route::get('login', [LoginController::class, 'showLogin'])->name('login');
Route::post('login', [LoginController::class, 'handleLogin'])->name('login.post');
Route::get('sign-out', [LoginController::class, 'logout'])->name('logout');
Route::get('register', [RegisterController::class, 'showRegister'])->name('register');
Route::post('register', [RegisterController::class, 'handleRegister'])->name('register.post');
Route::get('forgot-password', [ResetPasswordController::class, 'showForgotPassword'])->name('resetpass');

//Client
Route::get('/', [HomeController::class, 'showHome'])->name('home');
Route::get('/product-detail', function() {
    return view('clients.product-detail');
})->name('product-detail');

// Admin
Route::get('/products', function() {
    return view('admins.list-product');
});

// Route::get('/', [DemoController::class, 'show'])->name('demo.show');
