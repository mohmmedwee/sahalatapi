<?php
Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'admin', 'namespace' => 'admin\restaurant'], function () {


    Route::resource('restaurant', 'Restaurant');


});

