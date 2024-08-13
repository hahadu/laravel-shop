<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'store_order_economize';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('订单ID');
            $table->char('order_id',32)->default('')->comment('订单号');
            $table->integer('uid')->index()->unsigned()->default(0)->comment('用户id');
            $table->tinyInteger('order_type',1)->unsigned()->default(1)->comment('配送方式 1=商品订单 ，2=线下订单');
            $table->decimal('pay_price',12,2)->index()->unsigned()->default(0.00)->comment('实际支付金额');
            $table->decimal('postage_price',12,2)->unsigned()->default(0.00)->comment('邮费优惠金额');
            $table->decimal('member_price',12,2)->unsigned()->default(0.00)->comment('会员优惠金额');
            $table->decimal('offline_price',12,2)->unsigned()->default(0.00)->comment('线下优惠金额');
            $table->decimal('coupon_price',12,2)->unsigned()->default(0.00)->comment('优惠券优惠金额');
            $table->integer('add_time')->index()->unsigned()->default(0)->comment('创建时间');
            $table->tinyInteger('status',1)->index()->default(0)->comment('状态');
        });
        $this->setTableComment($this->table_name, '用户资金节省表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
