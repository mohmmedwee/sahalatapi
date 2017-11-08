<?php
Route::group(['middleware' => ['authorization'],'prefix' => 'common', 'namespace' => 'common\users'], function () {


    Route::get('/users/update-place', 'Users@updatePlace');
     Route::get('/users/print/{id}','Users@p');
    Route::resource('users', 'Users');
   

});

