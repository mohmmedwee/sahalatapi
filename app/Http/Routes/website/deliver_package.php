<?php
Route::group(['middleware' => ['authenticate.website'],'prefix' => 'website', 'namespace' => 'website\deliver_package'], function () {


    Route::resource('deliver_package', 'DeliverPackage');


});

