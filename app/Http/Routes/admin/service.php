<?php
Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'admin', 'namespace' => 'admin\service'], function () {


    Route::resource('service', 'Service');


});

