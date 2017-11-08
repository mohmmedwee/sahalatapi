<?php
Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'admin', 'namespace' => 'admin\service_company'], function () {


    Route::resource('service_company', 'ServiceCompany');


});

