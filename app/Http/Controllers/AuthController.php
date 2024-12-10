<?php
namespace App\Http\Controllers;
use App\Http\Requests\WechatLoginRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Redis;
use JWTAuth; // 使用 JWT 库
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    protected $service;

    public function __construct(AuthService $service)
    {
        $this->service = $service;
    }
    public function getCode(Request $request){
        $phonenum = $request->get('phonenum');
        return sendCode($phonenum);
    }
    public function login(RegisterRequest $request) {
        $data = $request->all();
        $result = smsCheck($data['phonenum'],$data['code'],$data['key']);
        if($result['code'] != 200){
            return error($result['msg']);
        }
        return $this->service->login($data);
    }
    public function wechatLogin(WechatLoginRequest $request){
        $data = $request->only(['openid']);
        return $this->service->wechatLogin($data);
    }
    public function logout() {
        auth()->logout();
        return success('退出成功');
    }


	// 创建用户并生成对应的 token
    public function create(Request $request) {
        $data = $request->only(['openid', 'phonenum', 'password']);
        $user = User::create($data);
        $token = JWTAuth::fromUser($user);
        // 返回 token
        return response([
            'token' => $token,
            'token_type' => 'bearer',
            // 过期时间
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
    public function getProfile() {
        return response([
            'data' => auth()->user()
        ]);
    }

}

