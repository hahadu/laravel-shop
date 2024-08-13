<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'store_cart';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('购物车表ID');
            $table->integer('uid')->index()->unsigned()->default(0)->comment('用户ID');
            $table->char('type',32)->index()->default('')->comment('类型');
            $table->integer('product_id')->unsigned()->default(0)->comment('商品ID');
            $table->char('product_attr_unique',16)->default('')->comment('商品属性');
            $table->smallint('cart_num')->unsigned()->default(0)->comment('商品数量');
            $table->integer('add_time')->unsigned()->default(0)->comment('添加时间');
            $table->tinyInteger('is_pay',1)->default(0)->comment('0 = 未购买 1 = 已购买');
            $table->tinyInteger('is_del',1)->default(0)->comment('是否删除');
            $table->tinyInteger('is_new',1)->default(0)->comment('是否为立即购买');
            $table->integer('combination_id')->unsigned()->default(0)->comment('拼团id');
            $table->integer('seckill_id')->unsigned()->default(0)->comment('秒杀商品ID');
            $table->integer('bargain_id')->unsigned()->default(0)->comment('砍价id');
            $table->integer('advance_id')->default(0)->comment('预售商品id');
            $table->tinyInteger('status',1)->default(1)->comment('购物车商品状态');
        });
        $this->setTableComment($this->table_name, '购物车表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
