<?php
Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'admin', 'namespace' => 'admin\area'], function () {


    Route::resource('area', 'Area');


});

