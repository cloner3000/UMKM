<?php
/**
 * Routing for dinas koperasi
 */
Route::group(['prefix' => 'diskop/','middleware' => ['auth','diskop']], function () {
    Route::get('dashboard', [
        'uses' => 'Dinskop\PageController@index',
        'as' => 'diskop.home'
    ]);

    Route::group(['prefix' => 'umkm/'], function (){
        Route::get('/list/baru', [
           'uses' => 'Dinskop\PageController@list_umkm',
            'as' => 'diskop.show.umkm'
        ]);

        Route::get('/list/nonvalid', [
            'uses' => 'Dinskop\PageController@nonvalid',
            'as' => 'diskop.show.umkm.nonvalid'
        ]);

        Route::post('/verify',[
            'uses' => 'Dinskop\ActivityController@verify',
            'as' => 'diskop.verify'
        ]);

        Route::get('/list/{id}', [
            'uses' => 'Dinskop\PageController@detail_umkm',
            'as' => 'diskop.detail.umkm'
        ]);
    });

    Route::group(['prefix' => 'akun/'], function () {
        Route::get('/', [
            'uses' => 'Dinskop\DiskopController@show',
            'as' => 'diskop.show.akun'
        ]);
    });
});
