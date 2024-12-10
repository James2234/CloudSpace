<?php

namespace App\Http\Controllers;

use App\Http\Requests\publishRequirementRequest;
use App\Http\Requests\SetUserInfoRequest;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }
    //
    public function setUserInfo(SetUserInfoRequest $request){
        $user_id = auth()->id();
        $data = $request->all();
        return $this->service->setUserInfo($user_id,$data);

    }

    public function publishRequirement(publishRequirementRequest $request){
        $data = $request->all();
        return $this->service->publishRequirement($data);
    }
    public function getPublishList(){
        return $this->service->getPublishList();
    }
}
