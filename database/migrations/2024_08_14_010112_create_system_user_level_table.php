<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'system_user_level';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('自增ID');
            $table->integer('mer_id')->default(0)->comment('商户id');
            $table->char('name',255)->default('')->comment('会员名称');
            $table->decimal('money',12,2)->default(0.00)->comment('购买金额');
            $table->integer('valid_date')->default(0)->comment('有效时间');
            $table->tinyInteger('is_forever')->default(0)->comment('是否为永久会员');
            $table->tinyInteger('is_pay')->default(0)->comment('是否购买,1=购买,0=不购买');
            $table->tinyInteger('is_show')->default(0)->comment('是否显示 1=显示,0=隐藏');
            $table->integer('grade')->default(0)->comment('会员等级');
            $table->decimal('discount',12,2)->default(0.00)->comment('享受折扣');
            $table->char('image',255)->default('')->comment('会员卡背景');
            $table->char('icon',255)->default('')->comment('会员图标');
            $table->text('explain')->nullable()->comment('说明');
            $table->integer('add_time')->default(0)->comment('添加时间');
            $table->tinyInteger('is_del')->default(0)->comment('是否删除.1=删除,0=未删除');
            $table->integer('exp_num')->default(0)->comment('升级经验');
        });
        $this->setTableComment($this->table_name, '设置用户等级表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
