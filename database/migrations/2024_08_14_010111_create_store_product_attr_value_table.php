<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'store_product_attr_value';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('主键id');
            $table->integer('product_id')->unsigned()->default(0)->comment('商品ID');
            $table->char('suk',128)->default('')->comment('商品属性索引值 (attr_value|attr_value[|....])');
            $table->integer('stock')->unsigned()->default(0)->comment('属性对应的库存');
            $table->integer('sales')->unsigned()->default(0)->comment('销量');
            $table->decimal('price',12,2)->unsigned()->default(0.00)->comment('属性金额');
            $table->char('image',128)->default('')->comment('图片');
            $table->char('unique',8)->index()->default('')->comment('唯一值');
            $table->decimal('cost',12,2)->unsigned()->default(0.00)->comment('成本价');
            $table->char('bar_code',50)->default('')->comment('商品条码');
            $table->decimal('ot_price',12,2)->default(0.00)->comment('原价');
            $table->decimal('vip_price',12,2)->default(0.00)->comment('会员专享价');
            $table->decimal('weight',12,2)->default(0.00)->comment('重量');
            $table->decimal('volume',12,2)->default(0.00)->comment('体积');
            $table->decimal('brokerage',12,2)->default(0.00)->comment('一级返佣');
            $table->decimal('brokerage_two',12,2)->default(0.00)->comment('二级返佣');
            $table->tinyInteger('type')->default(0)->comment('活动类型 0=商品，1=秒杀，2=砍价，3=拼团');
            $table->integer('quota')->default(0)->comment('活动限购数量');
            $table->integer('quota_show')->default(0)->comment('活动限购数量显示');
            $table->tinyInteger('is_virtual')->default(0)->comment('是否虚拟商品');
            $table->integer('coupon_id')->default(0)->comment('优惠券id');
            $table->text('disk_info')->nullable()->comment('虚拟信息内容');
        });
        $this->setTableComment($this->table_name, '商品属性值表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
