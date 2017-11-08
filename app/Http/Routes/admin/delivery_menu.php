<?php
Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'admin', 'namespace' => 'admin\delivery_menu'], function () {


    Route::resource('delivery_menu', 'DeliveryMenu');


});

