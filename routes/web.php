<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductDetailController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TermController;
use App\Http\Controllers\Admin\ProductVariableController;

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
Route::get('/admin/login', [\App\Http\Controllers\Admin\Auth\LoginController::class, 'showLoginForm'])->name('admin.login.show');
Route::post('/admin/login', [\App\Http\Controllers\Admin\Auth\LoginController::class, 'login'])->name('admin.login.handle');
//Route::group(['prefix' => 'admin', 'middleware' => ['can:isAdmin']], function(){
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function(){
    Route::get('/admin/logout', [\App\Http\Controllers\Admin\Auth\LoginController::class, 'logout'])->name('logout.handle');

    Route::controller(ProductController::class)->group(function (){
        Route::get('manage-product', 'showManageProduct')->name('product.show');
        Route::get('add-product', 'showAddProduct')->name('product_add.show');
        Route::post('add-product', 'handleAddProduct')->name('product_add.post');
        Route::get('edit-product/{id}', 'showEditProduct')->name('product_edit.show');
        Route::post('edit-product/{id}', 'handleEditProduct')->name('product_edit.post');
        Route::post('delete-product/{id}', 'deleteProduct')->name('product_delete.post');
        Route::get('view-product/{id}', 'showViewProduct')->name('product_view.show');
    });

    // Order
    Route::get('manage-order', [OrderController::class, 'showManageOrder'])->name('order.show');
    Route::get('order-detail', [OrderController::class, 'showOrderDetail'])->name('order_detail.show');

    // Category group
    Route::group(['controller' => CategoryController::class, 'prefix' => 'category'], function (){
        Route::get('category', 'listCategory')->name('list_category.show');
        Route::get('add', 'showAddCategory')->name('add_category.show');
        Route::post('add', 'handleAddCategory')->name('add_category.post');
        Route::get('edit/{id}', 'showEditCategory')->name('edit_category.show');
        Route::post('edit/{id}', 'handleEditCategory')->name('edit_category.post');
        Route::post('delete/{id}', 'deleteCategory')->name('delete_category.post');
    });

    Route::group(['controller' => TermController::class, 'prefix' => 'term'], function (){
        Route::get('/', 'listTerm')->name('list_term.show');
        Route::get('/add', 'showAddTerm')->name('add_term.show');
        Route::post('/add', 'handleAddTerm')->name('add_term.post');
        Route::get('/edit/{id}', 'showEditTerm')->name('edit_term.show');
        Route::post('/edit/{id}', 'handleEditTerm')->name('edit_term.post');
        Route::post('/delete/{id}', 'deleteTerm')->name('delete_term.post');
    });

    Route::group(['controller' => ProductVariableController::class, 'prefix' => 'product-variable'], function (){
        Route::get('/{id}', 'listProductVariable')->name('product_variable.index');
        Route::get('/add/{id}', 'showAddProductVariable')->name('product_variable.create');
        Route::post('/add/{id}', 'handleAddProductVariable')->name('product_variable.store');
        Route::get('/edit/{id}', 'showEditProductVariable')->name('product_variable.edit');
        Route::post('/edit/{id}', 'handleEditProductVariable')->name('product_variable.update');
        Route::post('/delete/{id}', 'deleteProductVariable')->name('product_variable.destroy');
    });
});

