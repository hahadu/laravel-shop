<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'store_service_record';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('自增ID');
            $table->integer('user_id')->default(0)->comment('发送人的uid');
            $table->integer('to_uid')->index()->default(0)->comment('送达人的uid');
            $table->char('nickname',50)->default('')->comment('用户昵称');
            $table->char('avatar',255)->default('')->comment('用户头像');
            $table->tinyInteger('is_tourist')->default(0)->comment('是否是游客');
            $table->tinyInteger('online')->default(0)->comment('是否在线');
            $table->tinyInteger('type')->default(0)->comment('0 = pc,1=微信，2=小程序，3=H5');
            $table->integer('add_time')->default(0)->comment('添加时间');
            $table->integer('update_time')->default(0)->comment('更新时间');
            $table->integer('mssage_num')->default(0)->comment('消息条数');
            $table->text('message')->nullable()->comment('内容');
            $table->tinyInteger('message_type')->default(0)->comment('消息类型');
        });
        $this->setTableComment($this->table_name, '客服聊天用户记录表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
