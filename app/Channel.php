<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{

    /**
     * 获取渠道信息
     *
     * @param $cid
     * @return mixed
     */
    static function getChannelInfo($url)
    {
        $info = Channel::where('url', $url)->first()->toArray();
        return $info;
    }

}
