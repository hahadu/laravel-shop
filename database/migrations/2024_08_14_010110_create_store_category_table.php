<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'store_category';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('商品分类表ID');
            $table->integer('pid')->index()->default(0)->comment('父id');
            $table->char('cate_name',100)->default('')->comment('分类名称');
            $table->integer('sort')->index()->default(0)->comment('排序');
            $table->char('pic',128)->default('')->comment('图标');
            $table->tinyInteger('is_show')->default(1)->comment('是否推荐');
            $table->integer('add_time')->index()->default(0)->comment('添加时间');
            $table->char('big_pic',255)->default('')->comment('分类大图');
        });
        $this->setTableComment($this->table_name, '商品分类表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
