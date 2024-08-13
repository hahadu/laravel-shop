<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'page_categroy';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('自增ID');
            $table->integer('pid')->default(0)->comment('父类id');
            $table->char('type',50)->default('link')->comment('类型:link、special、product、product_category、custom');
            $table->char('name',50)->default('')->comment('分类名称');
            $table->smallInteger('sort')->default(0)->comment('排序');
            $table->tinyInteger('status')->default(1)->comment('状态');
            $table->integer('add_time')->default(0)->comment('添加时间');
        });
        $this->setTableComment($this->table_name, '页面链接分类');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
