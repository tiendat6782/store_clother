<?php

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

Route::get('/', function () {
    return view('welcome');
});


Route::match(['GET','POST'],'login',[App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::match(['GET','POST'],'logout',[App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::get('/shop',[App\Http\Controllers\ProductController::class, 'trangchu'])->name('shop');

Route::get('/shop/add-to-cart/{id}',[App\Http\Controllers\ProductController::class, 'addToCart'])->name('addToCart');
Route::get('/shop/show-cart',[App\Http\Controllers\ProductController::class, 'showCart'])->name('showCart');
Route::get('/shop/update-cart',[App\Http\Controllers\ProductController::class, 'updateCart'])->name('updateCart');
Route::get('/shop/delete-cart',[App\Http\Controllers\ProductController::class, 'deleteCart'])->name('deleteCart');

Route::middleware(['auth','check.role'])->group(function(){

    Route::get('/product',[App\Http\Controllers\ProductController::class, 'index'])->name('route_product_index');
    Route::post('/product',[App\Http\Controllers\ProductController::class, 'index']);
    Route::match(['GET','POST'],'/product/add',[App\Http\Controllers\ProductController::class, 'addProduct'])->name('route_product_add');
    Route::match(['GET','POST'],'/product/edit/{id}',[App\Http\Controllers\ProductController::class, 'editProduct'])->name('route_product_edit');
    Route::match(['GET','POST'],'/product/delete/{id}',[App\Http\Controllers\ProductController::class, 'deleteProduct'])->name('route_product_delete');
    //category-------------------------
    Route::get('/category',[App\Http\Controllers\CategoryController::class, 'index'])->name('route_category_index');
    Route::post('/category',[App\Http\Controllers\CategoryController::class, 'index']);
    Route::match(['GET','POST'],'/category/add',[App\Http\Controllers\CategoryController::class, 'addCategory'])->name('route_category_add');
    Route::match(['GET','POST'],'/category/edit/{id}',[App\Http\Controllers\CategoryController::class, 'editCategory'])->name('route_category_edit');
    Route::match(['GET','POST'],'/category/delete/{id}',[App\Http\Controllers\CategoryController::class, 'deleteCategory'])->name('route_category_delete');
    //customer-------------------------
    Route::get('/customer',[App\Http\Controllers\CustomerController::class, 'index'])->name('route_customer_index');
    Route::post('/customer',[App\Http\Controllers\CustomerController::class, 'index']);
    Route::match(['GET','POST'],'/customer/add',[App\Http\Controllers\CustomerController::class, 'addCustomer'])->name('route_customer_add');
    Route::match(['GET','POST'],'/customer/edit/{id}',[App\Http\Controllers\CustomerController::class, 'editCustomer'])->name('route_customer_edit');
});//end route middleware

