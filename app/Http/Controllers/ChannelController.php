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
        $url  = $request->input('url');
        $tags = $request->input('tags');

        $error = false;
        if (trim($name) == '') {
            $error = '请填写活动名称！';
        } else if (trim($url) == '') {
            $error = '请填写活动地址！';
        } else if (trim($tags) == '') {
            $error = '请填写成员标签！';
        } else {
            if (Channel::where('url', $url)->count() > 0) {
                $error = '您选择的地址已经被使用了！';
            }
        }

        if ($error) {
            return view('error', ['msg' => $error]);
        } else {
            $channel = new Channel;
            $channel->name = $name;
            $channel->url  = $url;
            $channel->tags = str_replace('，', ',', $tags);
            if ($channel->save()) {
                return redirect('/channel/'.$channel->id.'/success');
            } else {
                return view('error', ['msg' => 'some error 001']);
            }
        }
    }

    // 显示二维码
    public function success(Request $request, $cid)
    {
        exit('now you are here');
        // 显示二维码
    }

    // 显示活动已登记成员列表
    public function user_list(Request $request, $cid)
    {

    }
}
