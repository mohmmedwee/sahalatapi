<?php
Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'admin', 'namespace' => 'admin\restaurant_users'], function () {


    Route::resource('restaurant_users', 'RestaurantUsers');


});

