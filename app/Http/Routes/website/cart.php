<?php

Route::group(['middleware' => ['website.authorization'],'namespace' => 'website\cart'], function () {
Route::get('/cart/delete/{id}','Cart@destroy');
    Route::resource('cart', 'Cart');
});

