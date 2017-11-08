<?php
Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'admin', 'namespace' => 'admin\address'], function () {


    Route::resource('address', 'Address');


});

