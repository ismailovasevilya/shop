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

// Route::get('/', function () {
//     return view('layouts.master');
// });
Route::get('/', 'App\Http\Controllers\ShopController@getContent')->name('getContent');
Route::get('/category/{slug}', 'App\Http\Controllers\CategoryController@products_in_category')->name('products_in_category');
Route::post('/order/{id}', 'App\Http\Controllers\OrderController@order')->name('order');
Route::post('/order/{order_id}/add', 'App\Http\Controllers\CartController@plus')->name('plus');
Route::post('/order/{order_id}/subtr', 'App\Http\Controllers\CartController@minus')->name('minus');
Route::get('/cart/{id}', 'App\Http\Controllers\CartController@cart')->name('cart');
Route::get('/checkout/auth', 'App\Http\Controllers\CartController@checkout_auth')->name('checkout_auth');
Route::get('/checkout/auth/register', 'App\Http\Controllers\CartController@checkout_not_auth')->name('checkout_not_auth');
Route::post('/checkout/main', 'App\Http\Controllers\CartController@checkout_main_auth')->name('checkout_main_auth');
Route::get('/price/up', 'App\Http\Controllers\ShopController@priceUp')->name('priceUp');
Route::get('/price/down', 'App\Http\Controllers\ShopController@priceDown')->name('priceDown');
Route::get('/day/up', 'App\Http\Controllers\ShopController@dayUp')->name('dayUp');
Route::get('/dat/down', 'App\Http\Controllers\ShopController@dayDown')->name('dayDown');
Route::get('/orders', 'App\Http\Controllers\OrderController@orders')->name('orders');




Route::get('/admin', 'App\Http\Controllers\HomeController@index')->name('admin');


Route::get('/admin/users', 'App\Http\Controllers\AdminController@getUsers')->name('getUsers');
Route::get('/admin/user/{id}/delete', 'App\Http\Controllers\AdminController@deleteUser')->name('deleteUser');
Route::get('/admin/user/{id}/edit', 'App\Http\Controllers\AdminController@getUser')->name('getUser');
Route::post('/admin/user/{id}/update', 'App\Http\Controllers\AdminController@updateUser')->name('updateUser');
Route::get('/admin/create_user', function() {
    return view('auth.register');
})->name('createUser');


Route::get('/admin/categories', 'App\Http\Controllers\CategoryController@getCategories')->name('getCategories');
Route::get('/admin/categories/add', 'App\Http\Controllers\CategoryController@openNewCategory')->name('openNewCategory');
Route::post('/admin/categories/add', 'App\Http\Controllers\CategoryController@addCategory')->name('addCategory');
Route::get('/admin/category/{id}/delete', 'App\Http\Controllers\CategoryController@deleteCategory')->name('deleteCategory');
Route::get('/admin/category/{slug}/edit', 'App\Http\Controllers\CategoryController@editCategory')->name('editCategory');
Route::post('/admin/category/{slug}/update', 'App\Http\Controllers\CategoryController@updateCategory')->name('updateCategory');
Route::get('/admin/category/{slug}', 'App\Http\Controllers\CategoryController@products_in_category')->name('admin_products_in_category');


Route::get('/admin/product', 'App\Http\Controllers\HomeController@index')->name('admin');
Route::get('/admin/product/add', 'App\Http\Controllers\ProductController@addProduct')->name('addProduct');
Route::post('/admin/product/create', 'App\Http\Controllers\ProductController@createProduct')->name('createProduct');
Route::get('/admin/product/{slug}/edit', 'App\Http\Controllers\ProductController@editProduct')->name('editProduct');
Route::post('/admin/product/{id}/update', 'App\Http\Controllers\ProductController@updateProduct')->name('updateProduct');
Route::get('/admin/product/{id}/delete', 'App\Http\Controllers\ProductController@deleteProduct')->name('deleteProduct');
Route::get('/admin/orders', 'App\Http\Controllers\OrderController@adminOrder')->name('adminOrder');
Route::post('admin/orders/{id}', 'App\Http\Controllers\OrderController@accept')->name('accept');



Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

