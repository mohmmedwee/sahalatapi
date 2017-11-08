<?php
Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'admin', 'namespace' => 'admin\contact_us'], function () {


    Route::resource('contact_us', 'ContactUs');


});

