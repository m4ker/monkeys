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
            return $this->_userRegister($request, $cid);
        } else {
            // view
            return $this->_showUserRegister($request, $cid);
        }
    }

    private function _userRegister(Request $request, $url)
    {
        //参数整理
        $channelInfo = Channel::where('url', $url)->first();
        $cid = $channelInfo['id'];

        $name = $request->input('name');
        $tags = str_replace('，', ',', $request->input('tags'));
        $contact = $request->input('contact');
        $channelId = $cid;
        $findTags = str_replace('，', ',', $request->input('findTags'));
        $error = '';
        if (empty($channelId)) {
            $error = 'hack！';
        } elseif (empty($name)) {
            $error = '请填写姓名';
        } elseif (empty($findTags)) {
            $error = '请选择倾向内容';
        } elseif (empty($tags)) {
            $error = '请填写标签！';
        } elseif (empty($contact)) {
            $error = '请填写联系方式！';
        }
        //处理错误，或添加数据
        if ($error) {
            return view('error', ['msg' => $error]);
        } else {
            //判断邮箱和手机号是否存在
            if ($this->_checkUser($contact, $channelId)) {
                return view('error', ['msg' => '当前用户已存在！']);
            } else {
                $user = new User();
                $user->name = $name;
                $user->channel_id = $channelId ? $channelId : time();
                $user->contact = $contact;
                $user->tags = implode(',', array_filter($tags));
                $user->find_tags = implode(',', array_filter($findTags));
                $result = $user->save();

                //var_dump($user);
                if ($result) {
                    //创建不时效的Cookie
                    return redirect('/event/suggest/' . $user->id . '/')->withCookie('userId_' . $url,
                        $user->id, 365 * 24 * 60 * 60);
                } else {
                    exit('some error 001');
                }
            }
        }
    }

    /**
     * 用户注册页
     *
     * @param Request $request
     * @param $cid
     * @return string
     */
    private function _showUserRegister(Request $request, $url)
    {
        $channelInfo = Channel::getChannelInfo($url);
        $tags = $channelInfo['tags'];
        $arrTags = explode(',', $tags);
        if (empty($channelInfo)) {
            return view('error', ['msg' => '渠道信息不存在']);
        } else {
            return view('/user/register', ['tags' => $arrTags, 'url' => $channelInfo['url']]);
        }
    }

    // 推荐用户
    public function suggest(Request $request, $uid)
    {
        //获取用户信息
        $user = User::find($uid);

        $channel = Channel::find($user['channel_id']);
        //获取推荐列表
        $users = User::getSuggest($user);

        return view('list', ['lists' => $users, 'channel' => $channel]);
    }

    private function _checkUser($contact, $channelId)
    {
        $hasUser = User::where('contact', $contact)->where('channel_id', $channelId)->count();
        return !empty($hasUser) ? true : false;
    }

}
