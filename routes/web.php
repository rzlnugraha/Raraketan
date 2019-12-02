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
    Route::put('/update/{id}', 'MasterDataController@update')->name('update');

    Route::post('/store_customer', 'MasterDataController@store')->name('store');
    Route::get('/edit_customer/{id}','MasterDataController@edit_customer')->name('edit_customer');
    Route::get('/edit_toko/{id}','MasterDataController@edit_toko')->name('edit_toko');
    Route::get('/edit_damage/{id}','MasterDataController@edit_damage')->name('edit_damage');

    Route::get('/edit-jenis-merk/{id}','MasterDataController@editJenisMerk')->name('edit_jenis_merk');

    Route::get('/edit_harga/{id}','MasterDataController@edit_harga')->name('edit_harga');
    Route::delete('/delete/{id}/{type}','MasterDataController@delete')->name('delete');
    
    Route::delete('/delete_customer/{id}', 'MasterDataController@delete_customer')->name('delete_customer');

    Route::get('/edit_merk/{id}','MasterDataController@edit_merk')->name('edit_merk');
    // Order
    Route::post('/store_order','OrderController@store')->name('order.store');
    Route::get('/delete_session/{index}','OrderController@delete')->name('delete_session');
    Route::get('/save_order/{grand_total}', 'OrderController@save_order')->name('save_order');

    // Dynamic Dropdown Ajax
    Route::get('/merk','AjaxController@merk')->name('merk_dropdown');
    Route::get('/json_rakets', 'AjaxController@json_rakets')->name('json_rakets');


});
