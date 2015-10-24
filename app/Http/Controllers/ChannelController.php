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
        $channel = Channel::find($cid);
        $url = $channel['url'];
        $width = 320;
        $api = "http://qr.liantu.com/api.php?text=";
        $reVal = array();
        if (strpos($url, '&')) {
            $url = str_replace('&', '%26', $url);
        }
        $reVal['src'] = $api . $url . '&el=h&w='. $width .'&m=10';
        $reVal['size'] = $width;
        
        //return $_reVal;
        return view('create_success', ['channel' => $channel,'reVal' => $reVal]);
        // 显示二维码
    }

    // 显示活动已登记成员列表
    public function user_list(Request $request, $cid)
    {
        //获取当前channel_id 的用户列表
        $users = User::getListByChannelId($cid);

        return view('user_list', ['lists' => $users]);
    }
}
