<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'store_product_cate';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('自增ID');
            $table->integer('product_id')->default(0)->comment('商品id');
            $table->integer('cate_id')->default(0)->comment('分类id');
            $table->integer('add_time')->default(0)->comment('添加时间');
            $table->integer('cate_pid')->default(0)->comment('一级分类id');
            $table->tinyInteger('status',1)->default(0)->comment('商品状态');
        });
        $this->setTableComment($this->table_name, '商品分类辅助表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
