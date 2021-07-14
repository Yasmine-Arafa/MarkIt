<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

//Route::get('/', function () {
 //   return view('welcome');
//});


Route::get('/','ProductsController@index')->name('home');
Route::get('/home','ProductsController@index');
Route::get('/search','ProductsController@search')->name('search');
Route::get('/cat/{cat}','ProductsController@cat')->name('cat');
Route::get('/signin', function () {
        return view('login');
    })->name('signin')->middleware('guest');
Auth::routes();
Route::post('/products/filter','ProductsController@filter')->name('filter');

Route::resource('products','ProductsController');

//Route::post('/cart/UpdateQty','CartController@updateqty')->name('UpdateQty');
Route::resource('cart','CartController');
//Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::resource('dashboard', 'DashboardController');



