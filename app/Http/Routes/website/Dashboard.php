<?php

Route::group(['middleware' => ['website.authorization'],'namespace' => 'website'], function () {
 Route::get('/', ['as' => 'website.index', 'uses' => 'dashboard\DashboardController@index']);
    //     Route::get('/', function(){return '5555555';});


 Route::get('/cuisine','dashboard\DashboardController@getallcuisine');


});
