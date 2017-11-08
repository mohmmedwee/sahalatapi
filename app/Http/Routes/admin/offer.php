<?php
Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'admin', 'namespace' => 'admin\offer'], function () {


    Route::resource('offer', 'Offer');


});

