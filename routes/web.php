<?php

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

Route::get('logout', 'Auth\LoginController@logout')->name('logout');


Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/product', 'ProductController@index')->name('product.index');
    Route::get('/product/{id}', 'ProductController@show')->name('product.show');
});

// Route::get('/currency/{id}', 'CurrenciesController@show');

Route::post('/country', 'CurrencyController@show')->name('country');

Route::get('/order', 'OrderController@create')->name('order.create');
Route::post('/order/store', 'OrderController@store')->name('order.store');
Route::get('/order/show', 'OrderController@show')->name('order.show');

Route::get('/address', 'AddressController@index')->name('address.index');

Route::post('/address/delete/{id}', 'AddressController@delete')->name('address.delete');

Route::post('/address/edit/{id}', 'AddressController@update')->name('address.edit');

Route::post('/address/add', 'AddressController@create')->name('address.add');


Route::post('/cart/{id}', 'CartController@create')->name('cart.create');

Route::get('/cart', 'CartController@show')->name('cart.show');

Route::get('/cart/delete/{id}', 'CartController@delete')->name('cart.delete');

Route::post('/cart/update/{id}', 'CartController@update')->name('cart.update');