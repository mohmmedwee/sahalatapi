<?php
Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'admin', 'namespace' => 'admin\service_boy'], function () {


    Route::resource('service_boy', 'ServiceBoy');


});

