<?php
Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'admin', 'namespace' => 'admin\payment'], function () {


    Route::resource('payment', 'Payment');
Route::get('/printtrans','Payment@printtrans');

Route::post('/email','Payment@email');

});




Route::any('/payment/knet/success', ['uses'=>'\App\Http\Controllers\admin\payment\Payment@getKnetSuccess','as'=>'admin.payment.knetSuccess']);
Route::any('/payment/knet/error', ['uses'=>'\App\Http\Controllers\admin\payment\Payment@getKnetError','as'=>'admin.payment.knetError']);
Route::any('/payment/knet/response', ['uses'=>'\App\Http\Controllers\admin\payment\Payment@getKnetResponse','as'=>'admin.payment.knetResponse']);