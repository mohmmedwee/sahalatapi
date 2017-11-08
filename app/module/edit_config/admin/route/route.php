<?php
Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'admin', 'namespace' => '\App\module\edit_config\admin\controller'], function () {

    Route::resource('edit_config','EditConfig');

    Route::resource('edit_rate_config','EditRateConfig');


});


