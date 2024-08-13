<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'agent_level_task';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('自增ID');
            $table->integer('level_id')->default(0)->comment('分销等级id');
            $table->char('name',50)->default('')->comment('任务名称');
            $table->tinyInteger('type',1)->default(0)->comment('任务类型');
            $table->integer('number')->default(0)->comment('任务限定数');
            $table->char('desc',255)->default('')->comment('任务描述');
            $table->tinyInteger('is_must',1)->default(0)->comment('是否必须达成0:其一1:所有');
            $table->smallint('sort')->default(0)->comment('排序');
            $table->tinyInteger('status',1)->default(1)->comment('状态');
            $table->tinyInteger('is_del',1)->default(0)->comment('是否删除');
            $table->integer('add_time')->default(0)->comment('添加时间');
        });
        $this->setTableComment($this->table_name, '分销员等级任务表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
