<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'store_order_refund';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('自增ID');
            $table->integer('store_order_id')->default(0)->comment('订单表ID');
            $table->integer('store_id')->default(0)->comment('门店ID');
            $table->char('order_id',50)->default('')->comment('订单号');
            $table->integer('uid')->default(0)->comment('用户UID');
            $table->tinyInteger('refund_type',1)->default(0)->comment('退款申请类型');
            $table->integer('refund_num')->default(0)->comment('退款件数');
            $table->decimal('refund_price',12,2)->default(0.00)->comment('退款金额');
            $table->decimal('refunded_price',12,2)->default(0.00)->comment('已退款金额');
            $table->char('refund_phone',32)->default('')->comment('退款电话');
            $table->char('refund_express',100)->default('')->comment('退货快递单号');
            $table->char('refund_express_name',255)->default('')->comment('退货快递名称');
            $table->char('refund_explain',255)->default('')->comment('退款用户说明');
            $table->text('refund_img')->nullable()->comment('退款图片');
            $table->char('refund_reason',255)->default('')->comment('不退款的理由');
            $table->char('refuse_reason',255)->default('')->comment('拒绝原因');
            $table->char('remark',255)->default('')->comment('备注');
            $table->integer('refunded_time')->default(0)->comment('处理时间');
            $table->longtext('cart_info')->nullable()->comment('退款商品信息');
            $table->tinyInteger('is_cancel',1)->default(0)->comment('用户是否取消');
            $table->tinyInteger('is_pink_cancel',1)->default(0)->comment('是否拼团自动取消');
            $table->tinyInteger('is_del',1)->nullable()->default(0)->comment('取消申请');
            $table->integer('add_time')->default(0)->comment('申请退款时间');
            $table->tinyInteger('is_system_del',1)->nullable()->default(0)->comment('系统删除');
        });
        $this->setTableComment($this->table_name, '退款订单表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
