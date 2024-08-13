<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'wechat_news_category';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('图文消息管理ID');
            $table->char('cate_name',255)->default('')->comment('图文名称');
            $table->integer('sort')->unsigned()->default(0)->comment('排序');
            $table->tinyInteger('status')->unsigned()->default(1)->comment('状态');
            $table->char('new_id',255)->default('')->comment('文章id');
            $table->char('add_time',255)->default('')->comment('添加时间');
        });
        $this->setTableComment($this->table_name, '图文消息管理表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
