<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'user_level';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('自增ID');
            $table->integer('uid')->default(0)->comment('用户uid');
            $table->integer('level_id')->default(0)->comment('等级vip');
            $table->integer('grade')->default(0)->comment('会员等级');
            $table->integer('valid_time')->default(0)->comment('过期时间');
            $table->tinyInteger('is_forever')->default(0)->comment('是否永久');
            $table->integer('mer_id')->default(0)->comment('商户id');
            $table->tinyInteger('status')->default(0)->comment('0:禁止,1:正常');
            $table->char('mark',255)->default('')->comment('备注');
            $table->tinyInteger('remind')->default(0)->comment('是否已通知');
            $table->tinyInteger('is_del')->default(0)->comment('是否删除,0=未删除,1=删除');
            $table->integer('add_time')->default(0)->comment('添加时间');
            $table->integer('discount')->default(0)->comment('享受折扣');
        });
        $this->setTableComment($this->table_name, '用户等级记录表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
