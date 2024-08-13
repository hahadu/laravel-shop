<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'other_order';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('自增ID');
            $table->integer('uid')->unsigned()->default(0)->comment('用户uid');
            $table->tinyInteger('type')->unsigned()->default(0)->comment('区别 
0：免费领取
1：购买会员卡 
2：卡密领取会员卡');
            $table->char('order_id',32)->default('')->comment('订单号');
            $table->char('member_type',10)->default('')->comment('会员类型 
月卡：month
季卡：quarter
年卡：year
永久：ever
免费：free');
            $table->char('code',20)->default('')->comment('卡号');
            $table->char('pay_type',32)->default('')->comment('支付方式');
            $table->tinyInteger('paid')->default(0)->comment('支付状态 0:  未支付 1：已支付');
            $table->decimal('pay_price',12,2)->unsigned()->default(0.00)->comment('支付金额');
            $table->decimal('member_price',12,2)->default(0.00)->comment('会员卡价格');
            $table->integer('pay_time')->unsigned()->default(0)->comment('会员购买时间');
            $table->char('trade_no',50)->default('')->comment('支付宝支付,支付宝交易订单号');
            $table->char('channel_type',10)->default('')->comment('支付渠道(微信公众号 h5 小程序)');
            $table->tinyInteger('is_free')->unsigned()->default(0)->comment('是否免费');
            $table->tinyInteger('is_permanent')->unsigned()->default(0)->comment('是否永久');
            $table->bigInteger('overdue_time')->unsigned()->default(0)->comment('会员过期时间');
            $table->tinyInteger('is_del')->default(0)->comment('删除');
            $table->integer('vip_day')->default(0)->comment('会员有效天数');
            $table->integer('add_time')->unsigned()->default(0)->comment('添加时间');
            $table->decimal('money',12,2)->unsigned()->default(0.00)->comment('原价格');
        });
        $this->setTableComment($this->table_name, '会员购买记录表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
