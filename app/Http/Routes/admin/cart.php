<?php
Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'admin', 'namespace' => 'admin\cart'], function () {


    Route::resource('cart', 'Cart');


});

