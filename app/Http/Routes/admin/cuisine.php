<?php
Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'admin', 'namespace' => 'admin\cuisine'], function () {


    Route::resource('cuisine', 'Cuisine');


});

