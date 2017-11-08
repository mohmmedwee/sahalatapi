<?php

Route::group(['middleware' => ['website.authorization'],'namespace' => 'website\contact_us'], function () {


    Route::resource('contact_us', 'ContactUs');
    Route::get('/feedback','ContactUs@feedback');
    Route::post('/email','ContactUs@feedbackemail');
});

