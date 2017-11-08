<?php
Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'admin', 'namespace' => 'admin\cms'], function () {


    Route::resource('cms', 'Cms');


});

