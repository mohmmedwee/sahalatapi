<?php

Route::get('login', [
    'before'=>'changeLanguage',
    'as' => 'client.auth.login',
    'uses' => 'common\authentication\AuthController@getLogin',
   
]);

Route::post('login', [
    'before'=>'changeLanguage',
    'uses' => 'common\authentication\AuthController@postLogin'
]);

Route::get('mt4-signup', [
    'before'=>'changeLanguage',
    'as' => 'client.auth.mt4Signup',
    'uses' => 'common\authentication\AuthController@getMt4Signup'
]);
Route::post('mt4-signup', [
    'before'=>'changeLanguage',
    'uses' => 'common\authentication\AuthController@postMt4Signup'
]);

Route::get('logout', [
    'as' => 'client.auth.logout',
    'uses' => 'common\authentication\AuthController@getLogout'
]);

Route::get('register', [
    'before'=>'changeLanguage',
    'as' => 'client.auth.register',
    'uses' => 'common\authentication\AuthController@getRegister'
]);

Route::get('recover', [
    'before'=>'changeLanguage',
    'as' => 'client.auth.recover',
    'uses' => 'common\authentication\AuthController@getRecover'
]);
Route::post('recover', [
    'as' => 'client.auth.recover',
    'uses' => 'common\authentication\AuthController@postRecover'
]);
Route::get('resetForgetPassword/{userId}/{code}', [
    'before'=>'changeLanguage',
    'as' => 'client.auth.resetForgetPassword',
    'uses' => 'common\authentication\AuthController@getResetForgetPassword'
]);
Route::post('resetForgetPassword/{userId}/{code}', [
    'before'=>'changeLanguage',
    'as' => 'client.auth.resetForgetPassword',
    'uses' => 'common\authentication\AuthController@postResetForgetPassword'
]);


Route::get('activateAccount/{userId}/{code}', [
    'before'=>'changeLanguage',
    'as' => 'client.auth.activateAccount',
    'uses' => 'AuthController@getActivateAccount'
]);

Route::post('activateAccount/{userId}/{code}', [
    'as' => 'client.auth.activateAccount',
    'uses' => 'common\authentication\AuthController@postResendActivateEmail'
]);




Route::Filter('changeLanguage',function($route, $oRequest){
    if ($oRequest->has('locale')) {
        Session::put('locale',$oRequest['locale']);
        return Redirect::back();
    } else if (!Session::has('locale')) {
        Session::put('locale', 'en');
    }


    App::setLocale(Session::get('locale'));


});




Route::get('facebook-login', [
    'as' => 'client.facebook.login',
    'uses' => 'common\authentication\AuthController@getFacebookLogin'
]);
Route::get('facebook-callback-login', [
    'as' => 'client.facebook_callback.login',
    'uses' => 'common\authentication\AuthController@getFacebookLoginCallback'
]);


Route::get('google-login', [
    'as' => 'client.google.login',
    'uses' => 'common\authentication\AuthController@getGoogleLogin'
]);
Route::get('google-callback-login', [
    'as' => 'client.google_callback.login',
    'uses' => 'common\authentication\AuthController@getGoogleLoginCallback'
]);

Route::get('linkedin-login', [
    'as' => 'client.linkedin.login',
    'uses' => 'common\authentication\AuthController@getLinkedinLogin'
]);
Route::get('linkedin-callback-login', [
    'as' => 'client.linkedin_callback.login',
    'uses' => 'common\authentication\AuthController@getLinkedinLoginCallback'
]);

Route::get('twitter-login', [
    'as' => 'client.twitter.login',
    'uses' => 'common\authentication\AuthController@getTwitterLogin'
]);
Route::get('twitter-callback-login', [
    'as' => 'client.twitter_callback.login',
    'uses' => 'common\authentication\AuthController@getTwitterLoginCallback'
]);



