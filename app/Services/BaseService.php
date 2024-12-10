<?php

namespace App\Services;

class BaseService
{
    protected function success($data = [],$msg='success')
    {
        return response()->json([
            'code' => 200,
            'message' => $msg,
            'data' => $data,
        ]);
    }
    protected function error($data = [], $code = 400)
    {
        return response()->json([
            'code' => $code,
            'message' => 'fail',
            'data' => $data,
        ]);
    }
}
