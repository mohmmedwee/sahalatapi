<?php 






// Route::group(['middleware' => ['jwt.auth'],'namespace' => '\api'], function () {


//     Route::get('api/test', 'AuthapiController@test');

// } );




Route::post('api/login',[

'uses'=>'\App\Http\Controllers\api\AuthapiController@Apilogin'

]);





Route::post('api/register',[

'uses'=>'\App\Http\Controllers\api\AuthapiController@Apiregister'

]);












?>