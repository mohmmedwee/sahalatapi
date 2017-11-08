<?php

Route::group(['middleware' => ['website.authorization'],'namespace' => 'website\cms'], function () {

    Route::get('/{pageAlias}', ['uses'=>'Cms@index','as'=>'website.cms.index']);

});

