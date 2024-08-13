<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'user_invoice';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('自增ID');
            $table->integer('uid')->default(0)->comment('用户id');
            $table->tinyInteger('header_type',1)->default(1)->comment('抬头类型1:个人2：企业');
            $table->tinyInteger('type',1)->default(1)->comment('发票类型1：普通2：专用');
            $table->char('name',100)->default('')->comment('名称（发票抬头）');
            $table->char('duty_number',50)->default('')->comment('税号');
            $table->char('drawer_phone',30)->default('')->comment('开票人手机号');
            $table->char('email',100)->default('')->comment('开票人邮箱');
            $table->char('tell',30)->default('')->comment('注册电话');
            $table->char('address',255)->default('')->comment('注册地址');
            $table->char('bank',50)->default('')->comment('注册开户银行');
            $table->char('card_number',50)->default('')->comment('银行卡号');
            $table->tinyInteger('is_default',1)->default(0)->comment('是否默认');
            $table->tinyInteger('is_del',1)->default(0)->comment('是否删除');
            $table->integer('add_time')->default(0)->comment('添加时间');
        });
        $this->setTableComment($this->table_name, '用户发票管理表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
