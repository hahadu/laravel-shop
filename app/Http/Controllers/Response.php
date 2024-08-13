<?php

namespace App\Http\Controllers;

use App\ErrorCode;
use Illuminate\Http\JsonResponse;

trait Response
{
    public function fail($code, $message = '', $data = []): JsonResponse
    {
        if(null == $message){
            if(is_numeric($code)){
                $message = ErrorCode::getErrorMessage($code);

            }else{
                $message = $code;
                $code = ErrorCode::FAIL;
            }
        }

        return $this->response($code, $message, $data);
    }

    public function success($data = []): JsonResponse
    {
        return $this->response(ErrorCode::SUCCESS, '操作成功', $data);
    }

    public function response($code, $message, $data): JsonResponse
    {
        return response()->json([
            'code' => $code,
            'request_id' => request()->__request_id,
            'message' => $message,
            'data' => $data
        ])->setEncodingOptions(JSON_UNESCAPED_UNICODE)->header('Access-Control-Allow-Origin','*')
            ->header('Access-Control-Request-Method','GET,POST,PUT');
    }
}
