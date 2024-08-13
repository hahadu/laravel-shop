<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'article_category';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('文章分类id');
            $table->integer('pid')->default(0)->comment('父级ID');
            $table->char('title',255)->default('')->comment('文章分类标题');
            $table->char('intr',255)->default('')->comment('文章分类简介');
            $table->char('image',255)->default('')->comment('文章分类图片');
            $table->tinyInteger('status')->unsigned()->default(1)->comment('状态');
            $table->integer('sort')->unsigned()->default(0)->comment('排序');
            $table->tinyInteger('is_del')->unsigned()->default(0)->comment('1删除0未删除');
            $table->char('add_time',255)->default('')->comment('添加时间');
            $table->tinyInteger('hidden')->unsigned()->default(0)->comment('是否隐藏');
        });
        $this->setTableComment($this->table_name, '文章分类表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
