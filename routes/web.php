<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
    return view('products');
});

Route::get('/search','ProductsController@search');
Route::get('/signin','PagesController@signin')->name('signin');
Auth::routes();
Route::resource('products','ProductsController');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



