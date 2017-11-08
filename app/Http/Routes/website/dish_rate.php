<?php

    Route::group(['middleware' => ['website.authorization'],'namespace' => 'website\dish_rate'], function () {

    Route::resource('dish_rate', 'DishRate');


});

