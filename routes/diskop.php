<?php
/**
 * Routing for dinas koperasi
 */
Route::group(['prefix' => 'diskop/'], function () {
    Route::get('dashboard', [
        'uses' => 'Dinskop\PageController@index',
        'as' => 'diskop.home'
    ]);
});
