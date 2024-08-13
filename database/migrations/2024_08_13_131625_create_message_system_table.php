<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'message_system';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('自增ID');
            $table->char('mark',50)->default('')->comment('标识');
            $table->integer('uid')->unsigned()->default(0)->comment('用户ID');
            $table->char('title',256)->default('')->comment('通知标题');
            $table->char('content',512)->default('')->comment('通知内容');
            $table->char('data',5000)->default('')->comment('站内信参数');
            $table->tinyInteger('look',1)->default(0)->comment('是否查看');
            $table->tinyInteger('type',1)->default(0)->comment('1:普通用户，2：管理员');
            $table->integer('add_time')->default(0)->comment('通知时间');
            $table->tinyInteger('is_del',1)->default(0)->comment('是否删除');
        });
        $this->setTableComment($this->table_name, '系统通知');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
