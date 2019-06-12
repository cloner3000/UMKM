<?php
/**
 * Routing for UMKM
 */
Route::group(['prefix' => 'umkm/','middleware' => ['auth','umkm']], function () {
    Route::get('dashboard', [
        'uses' => 'Umkm\PageController@index',
        'as' => 'umkm.home'
    ]);

    Route::group(['prefix' => 'produk/'], function () {

        Route::get('daftar', [
            'uses' => 'Umkm\PageController@produk',
            'as' => 'umkm.produk'
        ]);

        Route::get('form', [
            'uses' => 'Umkm\PageController@form_tambah',
            'as' => 'umkm.produk.tambah'
        ]);;

        Route::post('form', [
            'uses' => 'Umkm\ProductController@store',
            'as' => 'umkm.produk.add'
        ]);

        Route::get('edit/{id}', [
            'uses' => 'Umkm\PageController@edit_form',
            'as' => 'umkm.produk.edit'
        ]);

        Route::post('update', [
            'uses' => 'Umkm\ProductController@update',
            'as' => 'umkm.produk.update'
        ]);

        Route::get('detail/{id}', [
            'uses' => 'Umkm\PageController@detail_form',
            'as' => 'umkm.produk.detail'
        ]);

        Route::post('delete', [
            'uses' => 'Umkm\ProductController@destroy',
            'as' => 'umkm.produk.delete'
        ]);
    });

    Route::group(['prefix' => 'review/'], function () {
        Route::get('show', [
            'uses' => 'Umkm\PageController@review',
            'as' => 'umkm.review.show'
        ]);

        Route::get('show/filter', [
            'uses' => 'Umkm\Controller@review',
            'as' => 'umkm.review.filter'
        ]);
    });

    Route::group(['prefix' => 'comments/'], function () {
        Route::get('show', [
            'uses' => 'Umkm\PageController@komentar',
            'as' => 'umkm.komentar.show'
        ]);
    });

    Route::group(['prefix' => 'akun/'], function () {

        Route::get('/', [
            'uses' => 'Umkm\UmkmController@show',
            'as' => 'umkm.show.akun'
        ]);

        Route::get('/update', [
            'uses' => 'Umkm\UmkmController@show',
            'as' => 'umkm.show.update'
        ]);

        Route::post('/general/update', [
            'uses' => 'Umkm\UmkmController@update_general',
            'as' => 'umkm.general.update'
        ]);

        Route::post('/izin/update', [
            'uses' => 'Umkm\UmkmController@update_izin',
            'as' => 'umkm.izin.update'
        ]);
    });

});

