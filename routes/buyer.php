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

Route::group(['prefix' => 'action/','middleware' => ['buyer']], function () {


    Route::post('add_cart',[
        'uses' => 'Guest\BuyingController@add_cart',
        'as' => 'add.cart'
    ]);

    Route::group(['prefix' => 'keranjang/'], function () {

        Route::get('list', [
            'uses' => 'Guest\PageController@cart',
            'as' => 'cart'
        ]);
    });


    Route::post('remove_cart',[
        'uses' => 'Guest\BuyingController@cancel_cart',
        'as' => 'add.cart.remove'
    ]);

    Route::post('buying',[
        'uses' => 'Guest\BuyingController@buy',
        'as' => 'add.cart.buy'
    ]);

    Route::post('wish',[
        'uses' => 'Guest\BuyingController@add_wishlist',
        'as' => 'add.wishlist'
    ]);

    Route::post('remove_wish',[
        'uses' => 'Guest\BuyingController@remove_wishlist',
        'as' => 'add.wishlist.remove'
    ]);

    Route::post('comment',[
        'uses' => 'Guest\ReviewCommentController@comment_store',
        'as' => 'submit.comment'
    ]);

    Route::post('comment/answer',[
        'uses' => 'Guest\ReviewCommentController@answer_comment',
        'as' => 'submit.comment.answer'
    ]);
});
