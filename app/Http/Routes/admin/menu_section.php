<?php
Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'admin', 'namespace' => 'admin\menu_section'], function () {


    Route::resource('menu_section', 'MenuSection');


});

