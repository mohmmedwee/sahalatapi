<?php
Route::group(['middleware' => ['authenticate.website'],'prefix' => 'website', 'namespace' => 'website\restaurant_offer'], function () {


    Route::resource('restaurant_offer', 'RestaurantOffer');


});

