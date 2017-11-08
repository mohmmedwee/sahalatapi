<?php
Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'admin', 'namespace' => 'admin\governorate'], function () {


    Route::resource('governorate', 'Governorate');


});

