<?php

namespace App\Services;

use App\Events\AdminUserLoginEvent;
use App\Models\SystemAdmin;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Exception;

class SystemAdminService
{


    /**
     * 验证管理员账号密码登录
     * @param string $username
     * @param string $password
     * @return SystemAdmin|null
     * @throws \Throwable
     */
    public function verifyPasswordLogin(string $username, string $password)
    {
        $admin = SystemAdmin::where('username',$username)->first();

        throw_if(empty($admin),Exception::class,'账号不存在');
        throw_unless(Hash::check($password, $admin->password), \Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException::class,"账号密码错误");

        throw_unless($admin->status==true,Exception::class,'账号被禁用');
        $admin->last_time = Carbon::now();
        $admin->last_ip = app('request')->ip();
        $admin->login_count++;
        $admin->save();

        return $admin;

    }

    /**
     * @throws \Throwable
     */
    public function login(string $username, string $password, string $type='admin', string $key='')
    {
        $adminInfo = $this->verifyPasswordLogin($username,$password);
        $tokenInfo = $adminInfo->createToken($type);

        event(new AdminUserLoginEvent($adminInfo));

        return [
            'token' => $tokenInfo->plainTextToken,
            'expires_time' => $tokenInfo->accessToken->expires_at,
            'user_info' => $adminInfo,
            'logo' => app(SystemConfigService::class)->getConfigValue('site_logo'),
            'logo_square' => app(SystemConfigService::class)->getConfigValue('site_logo_square'),
            'version' => '',
            'site_name' => $this->sys_config('site_name'),
            'site_func' => $this->sys_config('model_checkbox', ['seckill', 'bargain', 'combination']),
        ];


    }

    public function sys_config(string $key, $default = '')
    {
        $config = app(SystemConfigService::class)->getConfigValue($key);
        if (empty($config)) {
            return $default;
        }
    }



}
