<?php
Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'admin', 'namespace' => 'admin\restaurant_rate'], function () {


    Route::resource('restaurant_rate', 'RestaurantRate');


});

