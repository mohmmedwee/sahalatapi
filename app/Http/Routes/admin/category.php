<?php
Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'admin', 'namespace' => 'admin\category'], function () {


    Route::resource('category', 'Category');


});

