<?php

namespace App\Services;

use App\Models\User;
use App\Services\BaseService;
use App\Models\PublishList;

class UserService extends BaseService
{
    public function setUserInfo($user_id,$params){
        $user = User::where('id',$user_id)->first();
        if($user){
            if(!$user['name']){
                $user->update($params);
                return success('设置信息成功');
            }else{
                return error('已设置信息不可更改');
            }

        }else{
            return error('用户不存在');
        }

    }
    public function publishRequirement($params){
        $is_exiest = PublishList::where('contact',$params['contact'])->first();
        if($is_exiest){
            return error('该用户已被录入!');
        }else{
            $params['uid'] = auth()->id();
            PublishList::create($params);
            return success('发布成功');
        }
    }
    public function getPublishList(){
        $user_id = auth()->id();
        $data = PublishList::where('uid',$user_id)
            ->orderBy('created_at','desc')
            ->select('name','room_type','location','budget','status','created_at')
            ->paginate(10);
        return success($data);
    }

}
