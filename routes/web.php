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

Route::get('/admin', 'App\Http\Controllers\HomeController@index')->name('admin');

Route::get('/admin/users', 'App\Http\Controllers\AdminController@getUsers')->name('getUsers');
Route::get('/admin/user/{id}/delete', 'App\Http\Controllers\AdminController@deleteUser')->name('deleteUser');
Route::get('/admin/user/{slug}/edit', 'App\Http\Controllers\AdminController@getUser')->name('getUser');
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


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

