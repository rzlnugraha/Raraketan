<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('order', 'OrderController@order')->name('order');
    Route::get('master-data', 'MasterDataController@index')->name('masterdata.index');
    Route::get('/home', 'HomeController@index')->name('home');

    // Master Data Customer/Toko
    Route::post('/store_customer', 'MasterDataController@store')->name('store');
    Route::get('/edit_customer/{id}','MasterDataController@edit_customer')->name('edit_customer');
    Route::get('/edit_toko/{id}','MasterDataController@edit_toko')->name('edit_toko');
    Route::put('/update_customer/{id}', 'MasterDataController@update')->name('update_customer');
    Route::delete('/delete_customer/{id}', 'MasterDataController@delete_customer')->name('delete_customer');

    // Order
    Route::post('/store_order','OrderController@store')->name('order.store');
    Route::get('/delete_session/{index}','OrderController@delete')->name('delete_session');

    // Dynamic Dropdown Ajax
    Route::get('/merk','AjaxController@merk')->name('merk_dropdown');
    Route::get('/json_rakets', 'AjaxController@json_rakets')->name('json_rakets');

});
