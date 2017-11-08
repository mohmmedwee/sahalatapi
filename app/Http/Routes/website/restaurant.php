<?php

Route::group(['middleware' => ['website.authorization'],'namespace' => 'website\restaurant'], function () {
    Route::get('/restaurant/menuItem', 'Restaurant@getMenuItem')->name('menuItem');
    Route::resource('restaurant', 'Restaurant');
    Route::resource('dish', 'Dish');



});

