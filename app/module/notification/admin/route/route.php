<?php
Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'admin', 'namespace' => '\App\module\notification\admin\controller'], function () {

    Route::resource('notification','Notification');


});


