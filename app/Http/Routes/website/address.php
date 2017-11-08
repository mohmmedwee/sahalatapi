<?php

Route::group(['middleware' => ['website.authorization'],'namespace' => 'website\address'], function () {


    Route::get('selectAddressFromMap', 'Address@selectAddressFromMap');
    Route::resource('address', 'Address');

    Route::get('/area','Address@getAllArea');
    Route::get('/website/address/{id}','Address@destroy');
});

