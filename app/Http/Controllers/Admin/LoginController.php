<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Services\SystemAdminService;
/**
 * 用户登录接口
 */
class LoginController extends Controller
{


    /**
     * 登录，
     * token最大有效期
     * @return JsonResponse
     */
    public function login(Request $request):JsonResponse
    {

        $adminInfo = app(SystemAdminService::class)->login($request->input('username'), $request->input('password'));
        return $this->success($adminInfo);
    }

}
