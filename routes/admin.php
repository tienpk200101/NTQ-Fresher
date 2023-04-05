<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TermController;
use App\Http\Controllers\Admin\ProductVariableController;
use App\Http\Controllers\Admin\AttributeController;

// Auth Admin
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('admin.login.show');
Route::post('/login', [LoginController::class, 'login'])->name('admin.login.handle');

//Route::group(['prefix' => 'admin', 'middleware' => ['can:isAdmin']], function(){
Route::group(['as' => 'admin.', 'middleware' => ['auth:web']], function(){
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout.handle');

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

    Route::group(['controller' => AttributeController::class, 'prefix' => 'attribute'], function (){
        Route::get('/{id}', 'listAttribute')->name('attribute.index');
        Route::post('/add', 'handleAddAttribute')->name('attribute.store');
        Route::get('/show/{id}', 'findAttribute')->name('attribute.show');
        Route::get('/edit/{slug}/{id}', 'showEditAttribute')->name('attribute.edit');
        Route::post('/edit/{term_id}/{id}', 'handleEditAttribute')->name('attribute.update');
        Route::post('/delete/{id}', 'deleteAttribute')->name('attribute.destroy');
    });
});

