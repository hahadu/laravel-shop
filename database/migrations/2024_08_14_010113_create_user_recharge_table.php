<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'user_recharge';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('自增ID');
            $table->integer('uid')->index()->default(0)->comment('充值用户UID');
            $table->char('order_id',32)->index()->default('')->comment('订单号');
            $table->char('trade_no',100)->default('')->comment('微信订单号');
            $table->decimal('price',12,2)->default(0.00)->comment('充值金额');
            $table->decimal('give_price',12,2)->default(0.00)->comment('购买赠送金额');
            $table->char('recharge_type',32)->index()->default('')->comment('充值类型');
            $table->tinyInteger('paid')->index()->default(0)->comment('是否充值');
            $table->integer('pay_time')->default(0)->comment('充值支付时间');
            $table->integer('add_time')->default(0)->comment('充值时间');
            $table->decimal('refund_price',12,2)->default(0.00)->comment('退款金额');
            $table->char('channel_type',255)->default('')->comment('用户访问端标识');
        });
        $this->setTableComment($this->table_name, '用户充值表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
