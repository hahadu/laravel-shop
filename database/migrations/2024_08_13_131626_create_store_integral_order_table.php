<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'store_integral_order';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('订单ID');
            $table->char('order_id',32)->default(0)->comment('订单号');
            $table->integer('uid')->index()->unsigned()->default(0)->comment('用户id');
            $table->char('real_name',32)->default('')->comment('用户姓名');
            $table->char('user_phone',18)->default('')->comment('用户电话');
            $table->char('user_address',100)->default('')->comment('详细地址');
            $table->integer('product_id')->default(0)->comment('商品id');
            $table->char('image',256)->default('')->comment('商品图片');
            $table->char('store_name',128)->default('')->comment('商品名称');
            $table->char('suk',128)->default('')->comment('规格');
            $table->integer('total_num')->unsigned()->default(0)->comment('订单商品总数');
            $table->decimal('price',12,2)->default(0.00)->comment('单价');
            $table->decimal('total_price',12,2)->unsigned()->default(0.00)->comment('总积分');
            $table->integer('add_time')->index()->unsigned()->default(0)->comment('创建时间');
            $table->tinyInteger('status',1)->index()->default(0)->comment('1：待发货；2：待收货；3：已完成；');
            $table->char('delivery_name',64)->default('')->comment('快递名称/送货人姓名');
            $table->char('delivery_code',50)->default('')->comment('快递公司编码');
            $table->char('delivery_type',32)->default('')->comment('发货类型');
            $table->char('delivery_id',64)->default('')->comment('快递单号/手机号');
            $table->char('fictitious_content',500)->default('')->comment('虚拟发货内容');
            $table->integer('delivery_uid')->default(0)->comment('配送员id');
            $table->char('mark',512)->default('')->comment('备注');
            $table->tinyInteger('is_del')->index()->unsigned()->default(0)->comment('是否删除');
            $table->char('remark',512)->default('')->comment('管理员备注');
            $table->integer('mer_id')->unsigned()->default(0)->comment('商户ID');
            $table->tinyInteger('is_mer_check')->unsigned()->default(0)->comment('');
            $table->tinyInteger('is_remind')->unsigned()->default(0)->comment('消息提醒');
            $table->tinyInteger('is_system_del',1)->default(0)->comment('后台是否删除');
            $table->char('channel_type',255)->default('')->comment('用户访问端标识');
            $table->char('province',255)->default('')->comment('用户省份');
            $table->char('express_dump',502)->default('')->comment('订单面单打印信息');
            $table->char('verify_code',125)->default('')->comment('核销码');
        });
        $this->setTableComment($this->table_name, '积分订单表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
