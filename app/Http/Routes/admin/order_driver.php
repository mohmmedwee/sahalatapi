<?php
Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'admin', 'namespace' => 'admin\order_driver'], function () {


    Route::get('/dispatcher-map', 'OrderDriver@getDispatcherMap')->name('admin.dispatcher.map');
    Route::get('/driver-map', 'OrderDriver@getDriverMap')->name('admin.driver.map');
 

    Route::get('/all-orders-map', 'OrderDriver@getAllOrdersMap')->name('admin.order.allmap');




    Route::controller('order_driver/chart', 'Chart', [
        'getBarChart' => 'admin.order_driver.chart.barChart',
        'getPieChart' => 'admin.order_driver.chart.pieChart',
        'getAttendChart'=> 'admin.order_driver.chart.attendChart',
    ]);

    Route::resource('order_driver', 'OrderDriver');


});

Route::group(['middleware' => [],'prefix' => 'admin', 'namespace' => 'admin\order_driver'], function () {

   Route::get('/order-map', 'OrderDriver@getOrderMap')->name('admin.order.map');

});
