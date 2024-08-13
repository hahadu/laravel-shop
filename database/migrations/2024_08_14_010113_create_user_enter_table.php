<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'user_enter';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('商户申请ID');
            $table->integer('uid')->index()->unsigned()->default(0)->comment('用户ID');
            $table->char('province',32)->index()->default('')->comment('商户所在省');
            $table->char('city',32)->default('')->comment('商户所在市');
            $table->char('district',32)->default('')->comment('商户所在区');
            $table->char('address',255)->default('')->comment('商户详细地址');
            $table->char('merchant_name',255)->default('')->comment('商户名称');
            $table->char('link_user',32)->default('')->comment('关联用户');
            $table->char('link_tel',16)->default('')->comment('商户电话');
            $table->char('charter',255)->default('')->comment('商户证书');
            $table->integer('add_time')->unsigned()->default(0)->comment('添加时间');
            $table->integer('apply_time')->unsigned()->default(0)->comment('审核时间');
            $table->integer('success_time')->default(0)->comment('通过时间');
            $table->char('fail_message',255)->default('')->comment('未通过原因');
            $table->integer('fail_time')->unsigned()->default(0)->comment('未通过时间');
            $table->tinyInteger('status')->index()->default(0)->comment('-1 审核未通过 0未审核 1审核通过');
            $table->tinyInteger('is_lock')->index()->unsigned()->default(0)->comment('0 = 开启 1= 关闭');
            $table->tinyInteger('is_del')->index()->unsigned()->default(0)->comment('是否删除');
        });
        $this->setTableComment($this->table_name, '商户申请表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
