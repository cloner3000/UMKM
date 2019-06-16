<?php
/**
 * Created by PhpStorm.
 * User: ilham
 * Date: 03/04/2019
 * Time: 18:18
 */
Route::get('/',[
    'uses' => 'Guest\PageController@index',
    'as' => 'landing'
]);

Route::get('detail/{id}',[
    'uses' => 'Guest\PageController@detail',
    'as' => 'detail.product'
]);
