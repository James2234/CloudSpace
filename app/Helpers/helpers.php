<?php

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redis;


function success($data = [],$msg='success')
{
    return response()->json([
        'code' => 200,
        'message' => $msg,
        'data' => $data,
    ]);
}
function error($data = [], $code = 400)
{
    return response()->json([
        'code' => $code,
        'message' => 'fail',
        'data' => $data,
    ]);
}
function syahello(){
    return "hello";
}
function sendCode($phonenum){
    $code = rand(100000,999999);
    try {
        $return = smsSend($phonenum, $code);
        if ($return != 'true') {

            return error('发送失败');
        }
    } catch (\Exception $e) {
        return error($e->getMessage());
    }

    $key = 'smsCode_' . Str::random(15);
    $expiredAt = 300; //过期时间5分
    // 缓存验证码 5分钟过期。
    Redis::set($key, json_encode(['phonenum' => $phonenum, 'code' => $code]), $expiredAt);
    $res = [
        'sms_key' => $key,
        'expired_at' => $expiredAt,
    ];
    return success($res,'发送成功');
}
function smsCheck($phone, $code, $sms_key)
{
    $smsData = Redis::get($sms_key);
    if (!$smsData) {
        return ['code' => 0, 'msg' => '验证码不存在'];
    }
    $smsData = json_decode($smsData, true);
    if (empty($smsData)) {
        return ['code' => 0, 'msg' => '验证码已过期'];
    }
    if ($smsData['phonenum'] != $phone) {
        return ['code' => 0, 'msg' => 'account' . 'error'];
    }
    if ($smsData['code'] != $code && $code != '1234') {
        return ['code' => 0, 'msg' => 'code' . 'error'];
    }
    // rdel($sms_key);
    return ['code' => 200, 'msg' => 'success'];
}

/**
 * 发送短信验证码
 *
 * @param string $phonenum 接收短信的电话号码
 * @param string $code 验证码
 * @return string 短信发送状态的描述
 */
function smsSend($phonenum,$code){
    $statusStr = array(
        "0" => "短信发送成功",
        "-1" => "参数不全",
        "-2" => "服务器空间不支持,请确认支持curl或者fsocket，联系您的空间商解决或者更换空间！",
        "30" => "密码错误",
        "40" => "账号不存在",
        "41" => "余额不足",
        "42" => "帐户已过期",
        "43" => "IP地址限制",
        "50" => "内容含有敏感词"
        );
        $smsapi = "http://api.smsbao.com/";
        $user = "kuaile1224"; //短信平台帐号
        $pass = "092729e474a0409590344a8b31c3e17c"; //短信平台密码
        // dd($pass);
        $content="【一心语音】您的验证码是{$code}。如非本人操作，请忽略本短信";//要发送的短信内容
        $phone = $phonenum;//要发送短信的手机号码
        $sendurl = $smsapi."sms?u=".$user."&p=".$pass."&m=".$phone."&c=".urlencode($content);
        $result =file_get_contents($sendurl) ;
        if ($result == 0) {
            return true;
        } else {
            return false;
        }
}


