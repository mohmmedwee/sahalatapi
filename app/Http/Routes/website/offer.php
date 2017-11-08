<?php
Route::group(['middleware' => ['authenticate.website'],'prefix' => 'website', 'namespace' => 'website\offer'], function () {


    Route::resource('offer', 'Offer');


});

