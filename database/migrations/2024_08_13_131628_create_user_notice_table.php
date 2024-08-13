<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'user_notice';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('自增ID');
            $table->text('uid')->nullable()->comment('接收消息的用户id（类型：json数据）');
            $table->tinyInteger('type',1)->default(1)->comment('消息通知类型（1：系统消息；2：用户通知）');
            $table->char('user',20)->default('')->comment('发送人');
            $table->char('title',20)->default('')->comment('通知消息的标题信息');
            $table->char('content',500)->default('')->comment('通知消息的内容');
            $table->integer('add_time')->default(0)->comment('通知消息发送的时间');
            $table->tinyInteger('is_send',1)->default(0)->comment('是否发送（0：未发送；1：已发送）');
            $table->integer('send_time')->default(0)->comment('发送时间');
        });
        $this->setTableComment($this->table_name, '用户通知表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
