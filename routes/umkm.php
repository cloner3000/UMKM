<?php
/**
 * Routing for UMKM
 */
Route::group(['prefix' => 'umkm/'], function () {
    Route::get('dashboard', [
        'uses' => 'Umkm\PageController@index',
        'as' => 'umkm.home'
    ]);

    Route::get('produk', [
        'uses' => 'Umkm\PageController@produk',
        'as' => 'umkm.produk'
    ]);
});

