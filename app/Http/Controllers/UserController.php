<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Channel;
use App\User;
use Illuminate\Support\Facades\Redirect;


class UserController extends Controller
{
    // 用户登记
    public function register(Request $request, $cid)
    {
        if ($request->isMethod('post')) {
            //register user
            return $this->_userRegister($request);
        } else {
            // view
            return $this->_showUserRegister($request);
        }
    }

    private function _userRegister(Request $request)
    {
        //参数整理
        $name = $request->input('name');
        $tags = $request->input('tags');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $channelId = $request->input('channelId');
        $findTags = $request->input('findTags');
        $error = '';
        if (!empty($channel)) {
            $error = 'hack！';
        } elseif (empty($name)) {
            $error = '请填写姓名';
        } elseif (empty($findTags)) {
            $error = '请选择倾向内容';
        } elseif (empty($tags)) {
            $error = '请填写标签！';
        } elseif (empty($phone)) {
            $error = '请填写手机号！';
        } elseif (empty($email)) {
            $error = '请填写联系邮箱';
        }
        //处理错误，或添加数据
        if ($error) {
            return view('error', ['msg' => $error]);
        } else {
            $channel = new User();
            $channel->name = $name;
            $channel->channel_id = $channelId ? $channel : time();
            $channel->contact = $phone;
            $channel->tags = $tags;
            $channel->find_tags = implode(',', $findTags);
            if ($channel->save()) {
                $userId = $channel->id;
                //创建不时效的Cookie
                return redirect('/event/' . $channel->channel_id . '/success')->withCookie('userId', $userId);
            } else {
                exit('some error 001');
            }
        }
    }

    private function _showUserRegister(Request $request)
    {
        return view('user/register');
    }

    // 推荐用户
    public function suggest(Request $request, $cid, $uid)
    {
        //获取用户信息
        $user = User::find($uid);

        //获取推荐列表
        $users = User::getSuggest($user);

        return view('suggest_list', ['lists' => $users]);
    }

}
