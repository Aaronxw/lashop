<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//注册请求
Route::get('signup','SignupController@signup');

//登录请求
Route::get('signin','SigninController@signin');

//忘记密码请求
Route::get('forgetemail','ForgetpwdController@forgetemail');
Route::get('forgetphone','ForgetpwdController@forgetphone');

//发送邮件
Route::get('mail/send','MailController@send');