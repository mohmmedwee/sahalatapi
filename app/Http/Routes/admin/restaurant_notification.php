<?php
Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'admin', 'namespace' => 'admin\restaurant_notification'], function () {


    Route::resource('restaurant_notification', 'RestaurantNotification');


});

