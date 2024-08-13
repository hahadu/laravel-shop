<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'store_product_log';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('自增ID');
            $table->enum('type','visit','cart','order','pay','collect','refund')->comment('类型');
            $table->integer('product_id')->default(0)->comment('商品ID');
            $table->integer('uid')->default(0)->comment('用户ID');
            $table->tinyInteger('visit_num')->default(0)->comment('是否浏览');
            $table->integer('cart_num')->default(0)->comment('加入购物车数量');
            $table->integer('order_num')->default(0)->comment('下单数量');
            $table->integer('pay_num')->default(0)->comment('支付数量');
            $table->decimal('pay_price',12,2)->default(0.00)->comment('支付金额');
            $table->decimal('cost_price',12,2)->default(0.00)->comment('商品成本价');
            $table->integer('pay_uid')->default(0)->comment('支付用户ID');
            $table->integer('refund_num')->default(0)->comment('退款数量');
            $table->decimal('refund_price',12,2)->default(0.00)->comment('退款金额');
            $table->tinyInteger('collect_num')->default(0)->comment('收藏');
            $table->integer('add_time')->default(0)->comment('添加时间');
        });
        $this->setTableComment($this->table_name, '商品统计');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
