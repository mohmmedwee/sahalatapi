<?php
Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'admin', 'namespace' => 'admin\users'], function () {


    Route::resource('users', 'Users');


});

