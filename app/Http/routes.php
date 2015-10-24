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

// 首页
Route::get('/', function(){
	return view('index');
});
// 创建活动
Route::get('/channel/create', 'ChannelController@create');
// 创建活动后端
Route::post('/channel/create', 'ChannelController@create');
// 创建成功
Route::get('/channel/{cid}/success', 'ChannelController@success');

// 频道用户列表
Route::get('/channel/{cid}', 'ChannelController@list');
// 登记
Route::get('/channel/{cid}/register', 'UserController@register');
// 登记后端
Route::post('/channel/{cid}/register', 'UserController@register');
// 用户智能匹配
Route::get('/channel/{cid}/suggest/{uid}', 'UserController@suggest');


