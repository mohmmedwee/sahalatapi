<?php 



Route::get('/cashon/{id}', ['uses'=>'\App\Http\Controllers\admin\paymentcash\Cashondelivery@success']);


Route::post('/cashemail',['uses'=>'\App\Http\Controllers\admin\paymentcash\Cashondelivery@cashemail']);






?>