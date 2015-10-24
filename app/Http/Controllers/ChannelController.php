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
        if ($request->isMethod('post')) {
            // save to mysql

        } else {
            // view

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
