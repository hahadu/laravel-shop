<?php

namespace App\Services;

use App\Models\SystemAdmin;
use Illuminate\Support\Facades\Hash;
use Exception;

class SystemAdminService
{


    /**
     * 验证管理员账号密码登录
     * @param string $username
     * @param string $password
     * @return mixed
     * @throws \Throwable
     */
    public function verifyPasswordLogin(string $username, string $password)
    {
        $admin = SystemAdmin::where('username',$username)->first();
        throw_if(empty($admin),Exception::class,'账号不存在');
        throw_unless(Hash::check($password, $admin->password), \Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException::class,"账号密码错误");
        throw_unless($admin->sataus,Exception::class,'账号被禁用');
        $admin->last_time = time();
        $admin->last_ip = app('request')->ip();
        $admin->login_count++;
        $admin->save();

        return $admin;

    }

    public function login(string $username,string $password,string $type,string $key='')
    {
        $adminInfo = $this->verifyPasswordLogin($username,$password);


    }


}
