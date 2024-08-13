<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'agent_level_task_record';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('自增ID');
            $table->integer('uid')->default(0)->comment('用户uid');
            $table->integer('level_id')->default(0)->comment('等级id');
            $table->integer('task_id')->default(0)->comment('任务id');
            $table->tinyInteger('status')->default(0)->comment('状态');
            $table->integer('add_time')->default(0)->comment('添加时间');
        });
        $this->setTableComment($this->table_name, '分销员完成等级任务表记录表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
