<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'system_event';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('');
            $table->char('name',255)->default('')->comment('事件名称');
            $table->char('mark',255)->default('')->comment('标签');
            $table->char('content',255)->default('')->comment('说明');
            $table->integer('add_time')->default(0)->comment('添加时间');
            $table->tinyInteger('is_del')->default(0)->comment('是否删除');
            $table->tinyInteger('is_open')->default(0)->comment('是否开启');
            $table->text('customCode')->comment('执行代码');
        });
        $this->setTableComment($this->table_name, '自定义事件');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
