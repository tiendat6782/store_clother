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
Route::get('/product',[App\Http\Controllers\ProductController::class, 'index']);
Route::post('/product',[App\Http\Controllers\ProductController::class, 'index']);
Route::match(['GET','POST'],'/product/add',[App\Http\Controllers\ProductController::class, 'addProduct'])->name('route_product_add');
Route::match(['GET','POST'],'/product/edit/{id}',[App\Http\Controllers\ProductController::class, 'editProduct'])->name('route_product_edit');
Route::get('/category',[App\Http\Controllers\CategoryController::class, 'index']);
Route::post('/category',[App\Http\Controllers\CategoryController::class, 'index']);
Route::match(['GET','POST'],'/category/add',[App\Http\Controllers\CategoryController::class, 'addCategory'])->name('route_category_add');
Route::match(['GET','POST'],'/category/edit/{id}',[App\Http\Controllers\CategoryController::class, 'editCategory'])->name('route_category_edit');