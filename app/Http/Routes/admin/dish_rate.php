<?php
Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'admin', 'namespace' => 'admin\dish_rate'], function () {


    Route::resource('dish_rate', 'DishRate');


});

