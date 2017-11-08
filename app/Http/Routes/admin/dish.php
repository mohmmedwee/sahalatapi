<?php
Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'admin', 'namespace' => 'admin\dish'], function () {


    Route::resource('dish', 'Dish');


});

