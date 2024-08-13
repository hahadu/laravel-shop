<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'store_service';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('客服id');
            $table->integer('mer_id')->default(0)->comment('商户id');
            $table->integer('uid')->default(0)->comment('客服uid');
            $table->tinyInteger('online',1)->default(0)->comment('是否在线');
            $table->char('account',255)->default('')->comment('账号');
            $table->char('password',255)->default('')->comment('密码');
            $table->char('avatar',250)->default('')->comment('客服头像');
            $table->char('nickname',50)->default('')->comment('代理名称');
            $table->char('phone',20)->default('')->comment('客服电话');
            $table->integer('add_time')->default(0)->comment('添加时间');
            $table->tinyInteger('status')->unsigned()->default(1)->comment('0隐藏1显示');
            $table->integer('notify')->default(0)->comment('订单通知1开启0关闭');
            $table->tinyInteger('customer',1)->default(0)->comment('是否展示统计管理');
            $table->char('uniqid',35)->default('')->comment('');
        });
        $this->setTableComment($this->table_name, '客服表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
