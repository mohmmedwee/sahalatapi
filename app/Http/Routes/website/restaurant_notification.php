<?php
Route::group(['middleware' => ['authenticate.website'],'prefix' => 'website', 'namespace' => 'website\restaurant_notification'], function () {


    Route::resource('restaurant_notification', 'RestaurantNotification');


});

