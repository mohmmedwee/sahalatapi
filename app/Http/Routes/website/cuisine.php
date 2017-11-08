<?php 
Route::group(['middleware' => ['website.authorization'],'namespace' => 'website\cuisine'], function () {
  
Route::resource('cuisine', 'Cuisine');

});













?>