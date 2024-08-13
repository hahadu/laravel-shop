<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'store_visit';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('自增ID');
            $table->integer('product_id')->index()->default(0)->comment('商品ID');
            $table->char('product_type',32)->default('')->comment('商品类型');
            $table->integer('cate_id')->default(0)->comment('商品分类ID');
            $table->char('type',50)->default('')->comment('商品类型');
            $table->integer('uid')->default(0)->comment('用户ID');
            $table->integer('count')->default(0)->comment('访问次数');
            $table->char('content',255)->default('')->comment('备注描述');
            $table->integer('add_time')->default(0)->comment('添加时间');
        });
        $this->setTableComment($this->table_name, '商品浏览分析表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
