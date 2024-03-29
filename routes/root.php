<?php
/**
 * Created by PhpStorm.
 * Routing Root
 */
Route::group(['prefix' => 'root/','middleware' => ['auth','root']], function () {

    Route::group(['prefix' => 'master/'], function () {

        Route::get('umkm-favorite', [
            'uses' => 'Root\PageController@umkmfavorite',
            'as' => 'root.fav.umkm'
        ]);

        Route::get('jenis-umkm', [
            'uses' => 'Root\PageController@jenisumkm',
            'as' => 'root.jenis.umkm'
        ]);

        Route::post('jenis-umkm/store', [
            'uses' => 'Root\DataMasterController@jenisUmkm_store',
            'as' => 'root.jenis.umkm.store'
        ]);

        Route::post('jenis-umkm/update', [
            'uses' => 'Root\DataMasterController@jenisUmkm_update',
            'as' => 'root.jenis.umkm.update'
        ]);

        Route::post('jenis-umkm/delete', [
            'uses' => 'Root\DataMasterController@jenisUmkm_destroy',
            'as' => 'root.jenis.umkm.delete'
        ]);

        Route::get('kategori', [
            'uses' => 'Root\PageController@kategori',
            'as' => 'root.kategori'
        ]);

        Route::post('kategori/store', [
            'uses' => 'Root\DataMasterController@kategori_store',
            'as' => 'root.kategori.store'
        ]);

        Route::post('kategori/update', [
            'uses' => 'Root\DataMasterController@kategori_update',
            'as' => 'root.kategori.update'
        ]);

        Route::post('kategori/delete', [
            'uses' => 'Root\DataMasterController@kategori_destroy',
            'as' => 'root.kategori.delete'
        ]);

        Route::get('role', [
            'uses' => 'Root\PageController@role',
            'as' => 'root.role'
        ]);

    });

    Route::group(['prefix' => 'user/'], function () {

        Route::get('petugas', [
            'uses' => 'Root\PageController@petugas_list',
            'as' => 'root.petugas'
        ]);

        Route::get('umkm', [
            'uses' => 'Root\PageController@umkm_list',
            'as' => 'root.umkm'
        ]);
    });
});
