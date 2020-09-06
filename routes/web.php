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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/address', 'AddressController@index')->name('index-addresses');
Route::post('/address', 'AddressController@create')->name('add-address');
Route::delete('/address/{id}', 'AddressController@delete')->name('delete-address');
