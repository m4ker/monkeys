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
Route::get('/channel/create', 'Channel@create');
// 创建活动后端
Route::post('/channel/create', 'Channel@create');
// 创建成功
Route::get('/channel/{cid}/success', 'Channel@success');

// 频道用户列表
Route::get('/channel/{cid}', 'Channel@list');
// 登记
Route::get('/channel/{cid}/register', 'User@register');
// 登记后端
Route::post('/channel/{cid}/register', 'User@register');
// 用户智能匹配
Route::get('/channel/{cid}/suggest/{uid}', 'User@suggest');


