<?php
Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'admin', 'namespace' => 'admin\banner'], function () {


    Route::resource('banner', 'Banner');


});

