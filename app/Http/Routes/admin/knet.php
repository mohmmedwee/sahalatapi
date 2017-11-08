<?php
Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'admin', 'namespace' => 'admin\knet'], function () {


    Route::resource('knet', 'Knet');


});

