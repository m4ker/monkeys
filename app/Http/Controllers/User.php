<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class User extends Controller
{
    // 用户登记
    public function register(Request $request, $cid)
    {
        if ($request->isMethod('post')) {
            // save to mysql
        } else {
            // view
        }
    }

    // 推荐用户
    public function seggest(Request $request, $cid, $uid)
    {
        //
    }

}
