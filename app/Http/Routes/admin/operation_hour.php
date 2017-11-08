<?php
Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'admin', 'namespace' => 'admin\operation_hour'], function () {


    Route::resource('operation_hour', 'OperationHour');


});

