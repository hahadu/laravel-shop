<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'page_link';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('自增ID');
            $table->integer('cate_id')->default(0)->comment('分类id');
            $table->tinyInteger('type')->default(1)->comment('分组1:基础2:分销3:个人中心');
            $table->char('name',50)->default('')->comment('页面名称');
            $table->char('url',255)->default('')->comment('页面链接');
            $table->char('param',255)->default('')->comment('参数');
            $table->char('example',255)->default('')->comment('事例');
            $table->tinyInteger('status')->default(1)->comment('状态');
            $table->smallInteger('sort')->default(0)->comment('排序');
            $table->integer('add_time')->default(0)->comment('添加时间');
        });
        $this->setTableComment($this->table_name, '页面链接');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
