<?php
Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'admin', 'namespace' => 'admin\restaurant_cuisine'], function () {


    Route::resource('restaurant_cuisine', 'RestaurantCuisine');


});

