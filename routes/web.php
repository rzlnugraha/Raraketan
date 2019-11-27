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

Route::group(['middleware' => ['auth']], function () {
    Route::get('order', 'OrderController@order')->name('order');
    Route::get('master-data', 'MasterDataController@index')->name('masterdata.index');
    Route::get('/home', 'HomeController@index')->name('home');

    // Master Data
    Route::post('/store_customer', 'MasterDataController@store')->name('store');
    Route::get('/edit_customer/{id}','MasterDataController@edit_customer')->name('edit_customer');
    Route::put('/update_customer/{id}', 'MasterDataController@update')->name('update_customer');
    Route::delete('/delete_customer/{id}', 'MasterDataController@delete_customer')->name('delete_customer');

});
