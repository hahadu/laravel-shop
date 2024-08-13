<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'out_account';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('自增ID');
            $table->char('appid',50)->default('')->comment('账号');
            $table->char('appsecret',100)->default('')->comment('密钥');
            $table->char('title',200)->default('')->comment('描述');
            $table->tinyInteger('status')->default(1)->comment('状态');
            $table->text('rules')->nullable()->comment('权限');
            $table->integer('add_time')->default(0)->comment('添加时间');
            $table->integer('last_time')->default(0)->comment('最后一次登录时间');
            $table->char('ip',30)->default('')->comment('IP');
            $table->tinyInteger('is_del')->default(0)->comment('是否删除');
            $table->tinyInteger('push_open')->default(0)->comment('是否推送');
            $table->char('push_account',255)->comment('推送账号');
            $table->char('push_password',255)->comment('推送密码');
            $table->char('push_token_url',255)->comment('获取推送token接口');
            $table->char('user_update_push',255)->comment('用户推送接口');
            $table->char('order_create_push',255)->default('')->comment('订单创建推送接口');
            $table->char('order_pay_push',255)->default('')->comment('订单支付推送接口');
            $table->char('refund_create_push',255)->default('')->comment('售后订单创建推送接口');
            $table->char('refund_cancel_push',255)->default('')->comment('售后订单取消推送接口');
        });
        $this->setTableComment($this->table_name, '对外接口账号');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
