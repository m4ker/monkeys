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
    	$users = User::where('channel_id', $user['channel_id'])
    			->where(function($query) use ($user) {
                    $query->where('tags', $user['find_tags'])
                          ->orWhere('find_tags', $user['tags']);
                })
                //where('tags', $user['find_tags'])
                ->orderBy('name', 'asc')
                ->get();
        return $users;
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
