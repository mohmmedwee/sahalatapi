<?php
Route::group(['middleware' => ['authenticate.admin'],'prefix' => 'admin', 'namespace' => 'admin\audit_track'], function () {


    Route::resource('audit_track', 'AuditTrack');


});

