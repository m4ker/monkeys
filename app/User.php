<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /*
    *  获取$user 的推荐列表 即$user需要的人
    *
    */
    static function getSuggest($user)
    {
        $data = [];
        $tags = explode(',', $user['tags']);
        $find_tags = explode(',', $user['find_tags']);

        $users = User::where('channel_id', $user['channel_id'])
            ->orderBy('name', 'asc')
            ->get();
        foreach ($users as $key => $value) {
            $u_tags = explode(',', $value['tags']);
            $u_find_tags = explode(',', $value['find_tags']);
            foreach ($tags as $k => $v) {
                if (in_array($v, $u_find_tags)) {
                	$value['class'] = 'user-matched';
                    $data[] = $value;
                    continue 2;
                }
            }
            foreach ($find_tags as $fk => $fv) {
                if (in_array($fv, $u_tags)) {
                	$value['class'] = 'user-matched';
                    $data[] = $value;
                    continue 2;
                }
            }
            $value['class'] = '';
            $data[] = $value;
        }
        return $data;
    }

    /*
    *  获取$userLists 通过  channel_id
    *
    */
    static function getListByChannelId($cid)
    {
        $users = User::where('channel_id', $cid)
            ->orderBy('name', 'asc')
            ->get();
        return $users;
    }
}
