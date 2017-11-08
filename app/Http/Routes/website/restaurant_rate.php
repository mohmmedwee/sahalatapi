<?php

    Route::group(['middleware' => ['website.authorization'],'namespace' => 'website\restaurant_rate'], function () {

    Route::resource('restaurant_rate', 'RestaurantRate');


});

