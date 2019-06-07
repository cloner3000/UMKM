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

        Route::get('role', [
            'uses' => 'Root\PageController@role',
            'as' => 'root.role'
        ]);

    });
});
