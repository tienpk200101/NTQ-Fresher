<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\DemoController;
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

// Route::get('/', [DemoController::class, 'show'])->name('demo.show');
Route::get('/a', function(){
    return view('clients.index');
});

Route::get('/products', function() {
    return view('admins.list-product');
});
Route::get('/product-detail', function() {
    return view('admins.product-detail');
})->name('product-detail');

// Auth
Route::get('login', [LoginController::class, 'showLogin'])->name('login');
Route::get('register', [RegisterController::class, 'showRegister'])->name('register');
Route::post('register', [RegisterController::class, 'postRegister'])->name('register.post');
Route::get('forgot-password', [ResetPasswordController::class, 'showForgotPassword'])->name('resetpass');