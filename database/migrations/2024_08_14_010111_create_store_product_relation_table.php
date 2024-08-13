<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'store_product_relation';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->integer('uid')->index()->unsigned()->default(0)->comment('用户ID');
            $table->integer('product_id')->unsigned()->default(0)->comment('商品ID');
            $table->char('type',32)->index()->default('')->comment('类型(收藏(collect）、点赞(like))');
            $table->char('category',32)->index()->default('')->comment('某种类型的商品(普通商品、秒杀商品)');
            $table->integer('add_time')->unsigned()->default(0)->comment('添加时间');
        });
        $this->setTableComment($this->table_name, '商品点赞和收藏表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
