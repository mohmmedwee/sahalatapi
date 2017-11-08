<?php

    Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'admin', 'namespace' => 'admin\payment_way'], function () {


    Route::resource('payment_way', 'PaymentWay');


});

