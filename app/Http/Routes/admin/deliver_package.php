<?php
Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'admin', 'namespace' => 'admin\deliver_package'], function () {


    Route::resource('deliver_package', 'DeliverPackage');


});

