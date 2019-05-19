<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('landing');

Auth::routes();

Route::post('guest/auth',[
    'uses' => 'Auth\GuestRegisterController@register',
    'as' => 'auth.guest'
]);

Route::post('umkm/auth',[
    'uses' => 'Auth\UmkmRegisterController@register',
    'as' => 'auth.umkm'
]);

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'user/'], function () {
    Route::post('update', [
        'uses' => 'UserController@update',
        'as' => 'user.update'
    ]);
});
