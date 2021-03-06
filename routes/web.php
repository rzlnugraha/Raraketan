<?php

Route::get('/', function () {
    return redirect('/home');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('order', 'OrderController@order')->name('order');
    Route::get('master-data', 'MasterDataController@index')->name('masterdata.index');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/change-profile','HomeController@changeProfile')->name('change.profile');
    Route::post('/save-profile','HomeController@saveProfile')->name('save.profile');

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
    Route::POST('/save_order', 'OrderController@save_order')->name('save_order');
    Route::get('/history-order','OrderController@historyOrder')->name('history.order');
    Route::get('/detail-order/{id}','OrderController@detailOrder')->name('detail.order');
    Route::get('/detail-order/print/{id}','OrderController@detailPrint')->name('print.detail');
    Route::get('/hapus-order/{id}','OrderController@hapusOrder')->name('hapus.order');

    # Kirim Pesanan
    Route::get('/send-order','OrderController@sendOrder')->name('send.order');
    Route::get('/send-order/send/{id}','OrderController@sendOrderForm')->name('send.order.form');
    Route::post('/send-order/save-send-order','OrderController@saveSendOrder')->name('save.send.order');

    // Dynamic Dropdown Ajax
    Route::get('/merk','AjaxController@merk')->name('merk_dropdown');
    Route::get('/json_rakets', 'AjaxController@json_rakets')->name('json_rakets');

    // Export Excel
    Route::get('/history-periode', 'OrderController@exportOrder')->name('exportOrder');
});
