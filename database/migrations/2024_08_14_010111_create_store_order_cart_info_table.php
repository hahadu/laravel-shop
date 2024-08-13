<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'store_order_cart_info';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('自增ID');
            $table->integer('oid')->index()->default(0)->comment('订单id');
            $table->integer('uid')->default(0)->comment('用户uid');
            $table->char('cart_id',50)->index()->default(0)->comment('购物车id');
            $table->integer('product_id')->index()->default(0)->comment('商品ID');
            $table->char('old_cart_id',50)->default('')->comment('拆单前cart_id');
            $table->integer('cart_num')->default(0)->comment('数量');
            $table->integer('refund_num')->default(0)->comment('退款件数');
            $table->integer('surplus_num')->default(0)->comment('拆分后剩余数量');
            $table->integer('split_status')->default(0)->comment('0:未拆分1:还可以拆分2：拆分完成');
            $table->text('cart_info')->nullable()->comment('购买东西的详细信息');
            $table->char('unique',32)->default('')->comment('唯一id');
        });
        $this->setTableComment($this->table_name, '订单购物详情表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
