<?php

namespace App\Services;

use App\Models\User;
use App\Services\BaseService;
use JWTAuth;

class AuthService extends BaseService
{
    public function login($params){
        $user = User::where('phonenum',$params['phonenum'])->first();
        if($user){

        }else{
            $info['nickname'] = '用户'.rand(1000,9999);
            $info['avatar'] = '';
            $info['phonenum'] = $params['phonenum'];

            $user = User::create($info);
        }
        $token = JWTAuth::fromUser($user);
        // 返回 token
        return success([
            'token' => $token,
            'token_type' => 'bearer',
            // 过期时间
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
    public function wechatLogin($params){
        $user = User::where('openid',$params['openid'])->first();
        if($user){

        }else{
            $info['nickname'] = '用户'.rand(1000,9999);
            $info['avatar'] = '';
            $info['openid'] = $params['openid'];

            $user = User::create($info);
        }
        $token = JWTAuth::fromUser($user);
        // 返回 token
        return success([
            'token' => $token,
            'token_type' => 'bearer',
            // 过期时间
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
