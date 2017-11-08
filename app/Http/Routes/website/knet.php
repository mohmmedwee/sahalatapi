<?php
Route::group(['middleware' => ['authenticate.website'],'prefix' => 'website', 'namespace' => 'website\knet'], function () {


    Route::resource('knet', 'Knet');


});

