<?php
Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'admin', 'namespace' => 'admin\restaurant_offer'], function () {


    Route::resource('restaurant_offer', 'RestaurantOffer');


});

