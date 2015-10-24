<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Channel;
use App\User;

class ChannelController extends Controller
{

    // 创建活动
    public function create(Request $request)
    {
        $name = $request->input('name');
        $link = $request->input('link');
        $tags = $request->input('tags');
        //var_dump($_POST);
        //var_dump($name);
        //exit;
        $error = false;
        if (trim($name) == '') {
            $error = '请填写活动名称！';
        } else if (trim($link) == '') {
            $error = '请填写活动地址！';
        } else if (trim($tags) == '') {
            $error = '请填写成员标签！';
        } else {
            if (0) {
                $error = '您选择的标签已经被使用了！';
            }
        }
        if ($error) {
            return view('error', ['msg' => $error]);
        } else {
            $channel = new Channel;
            $channel->name = $name;
            $channel->link = $link;
            $channel->tags = $tags;
            if ($channel->save()) {
                return redirect()->route('/channel/{cid}/success', ['cid' => $channel->id]);
            } else {
                exit('some error 001');
            }
        }
    }

    // 显示二维码
    public function success(Request $request, $cid)
    {
        // 显示二维码
    }

    // 显示活动已登记成员列表
    public function user_list(Request $request, $cid)
    {

    }
}
