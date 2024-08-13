<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'user_extract';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('自增ID');
            $table->char('wechat_order_id',32)->default('')->comment('微信订单ID');
            $table->integer('uid')->unsigned()->default(0)->comment('用户id');
            $table->char('real_name',64)->default('')->comment('名称');
            $table->char('extract_type',32)->index()->default('bank')->comment('bank = 银行卡 alipay = 支付宝wx=微信');
            $table->char('bank_code',32)->default(0)->comment('银行卡');
            $table->char('bank_address',255)->default('')->comment('开户地址');
            $table->char('alipay_code',64)->default('')->comment('支付宝账号');
            $table->decimal('extract_price',12,2)->unsigned()->default(0.00)->comment('提现金额');
            $table->decimal('extract_fee',12,2)->unsigned()->default(0.00)->comment('提现手续费');
            $table->char('mark',255)->default('')->comment('备注');
            $table->decimal('balance',12,2)->unsigned()->default(0.00)->comment('提现前佣金');
            $table->char('fail_msg',128)->default('')->comment('无效原因');
            $table->integer('fail_time')->index()->unsigned()->default(0)->comment('无效时间');
            $table->integer('add_time')->index()->unsigned()->default(0)->comment('添加时间');
            $table->tinyInteger('status')->index()->default(0)->comment('-1 未通过 0 审核中 1 已提现');
            $table->char('wechat',50)->default('')->comment('微信号');
            $table->char('qrcode_url',255)->default('')->comment('二维码地址');
        });
        $this->setTableComment($this->table_name, '用户提现表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
