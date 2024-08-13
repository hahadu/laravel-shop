<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'store_order_invoice';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('自增ID');
            $table->integer('uid')->default(0)->comment('用户uid');
            $table->char('category',10)->default('order')->comment('开票分类 order:订单');
            $table->integer('order_id')->default(0)->comment('订单id');
            $table->integer('invoice_id')->default(0)->comment('发票id');
            $table->tinyInteger('header_type')->default(1)->comment('抬头类型');
            $table->tinyInteger('type')->default(1)->comment('发票类型');
            $table->char('name',100)->default('')->comment('名称（发票抬头）');
            $table->char('duty_number',50)->default('')->comment('税号');
            $table->char('drawer_phone',30)->default('')->comment('开票人手机号');
            $table->char('email',100)->default('')->comment('开票人邮箱');
            $table->char('tell',30)->default('')->comment('注册电话');
            $table->char('address',255)->default('')->comment('注册地址');
            $table->char('bank',50)->default('')->comment('开户行');
            $table->char('card_number',50)->default('')->comment('银行卡号');
            $table->tinyInteger('is_pay')->default(0)->comment('是否支付');
            $table->tinyInteger('is_refund')->default(0)->comment('订单是否退款');
            $table->tinyInteger('is_invoice')->default(0)->comment('是否开票');
            $table->char('invoice_number',50)->default('')->comment('开票票号');
            $table->char('remark',255)->default('')->comment('备注');
            $table->integer('invoice_time')->default(0)->comment('开票时间');
            $table->integer('add_time')->default(0)->comment('添加时间');
            $table->char('unique_num',255)->default('')->comment('唯一值');
            $table->char('invoice_num',255)->default('')->comment('发票号码');
            $table->char('invoice_type',255)->default('')->comment('发票类型');
            $table->char('invoice_serial_number',255)->default('')->comment('发票流水号');
            $table->char('red_invoice_num',255)->default('')->comment('发票红字编码');
            $table->tinyInteger('is_del')->nullable()->default(0)->comment('是否删除');
        });
        $this->setTableComment($this->table_name, '订单发票表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
