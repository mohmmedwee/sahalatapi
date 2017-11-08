<?php
Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'admin', 'namespace' => 'admin\restaurant_area'], function () {


    Route::resource('restaurant_area', 'RestaurantArea');
    
Route::GET('/skills/add', 'RestaurantArea@area')->name('addSkills');
Route::POST('/skills/add', 'RestaurantArea@area')->name('saveSkills');

});

