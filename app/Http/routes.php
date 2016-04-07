<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['web']], function(){
    // Don't put url here.
});

Route::group(['middleware' => ['web', 'wechat.oauth']], function () {
    // Route::get('/wechat/user', function () {
    //     $user = session('wechat.oauth_user'); // 拿到授权用户资料
    //
    //     dd($user);
    // });
});

Route::any('/wechat', "WechatController@serve");
