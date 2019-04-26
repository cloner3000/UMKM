<?php
/**
 * Routing for dinas koperasi
 */
Route::group(['prefix' => 'diskop/'], function () {
    Route::get('dashboard', [
        'uses' => 'Dinskop\PageController@index',
        'as' => 'diskop.home'
    ]);

    Route::group(['prefix' => 'akun/'], function () {
        Route::get('/', [
            'uses' => 'Dinskop\DiskopController@show',
            'as' => 'diskop.show.akun'
        ]);
    });
});
