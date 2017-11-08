<?php

Route::group(['middleware' => ['authenticate.admin']], function () {
    Route::get('/', ['as' => 'admin.index', 'uses' => 'DashboardController@index']);


});
