<?php
Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'admin', 'namespace' => 'admin\service_company_order'], function () {


    Route::resource('service_company_order', 'ServiceCompanyOrder');


});

