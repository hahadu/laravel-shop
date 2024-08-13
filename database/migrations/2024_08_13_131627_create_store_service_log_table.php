<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'store_service_log';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('客服用户对话记录表ID');
            $table->integer('mer_id')->default(0)->comment('商户id');
            $table->text('msn')->nullable()->comment('消息内容');
            $table->integer('uid')->default(1)->comment('发送人uid');
            $table->integer('to_uid')->default(1)->comment('接收人uid');
            $table->tinyInteger('is_tourist',1)->default(0)->comment('1=游客模式，0=非游客');
            $table->tinyInteger('time_node',1)->default(0)->comment('时间节点');
            $table->integer('add_time')->default(0)->comment('发送时间');
            $table->tinyInteger('type',1)->default(0)->comment('是否已读（0：否；1：是；）');
            $table->tinyInteger('remind',1)->default(0)->comment('是否提醒过');
            $table->tinyInteger('msn_type')->unsigned()->default(1)->comment('消息类型 1=文字 2=表情 3=图片 4=语音');
        });
        $this->setTableComment($this->table_name, '客服用户对话记录表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
