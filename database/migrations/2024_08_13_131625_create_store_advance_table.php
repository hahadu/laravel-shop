<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'store_advance';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('预售商品id');
            $table->integer('product_id')->unsigned()->default(0)->comment('商品id');
            $table->char('image',255)->default('')->comment('商品主图');
            $table->char('images',2000)->default('')->comment('轮播图');
            $table->char('title',255)->default('')->comment('活动标题');
            $table->char('info',255)->default('')->comment('简介');
            $table->decimal('price',12,2)->unsigned()->default(0.00)->comment('价格');
            $table->decimal('ot_price',12,2)->unsigned()->default(0.00)->comment('原价');
            $table->integer('sort')->unsigned()->default(0)->comment('排序');
            $table->integer('stock')->unsigned()->default(0)->comment('库存');
            $table->integer('sales')->unsigned()->default(0)->comment('销量');
            $table->char('unit_name',16)->default('')->comment('单位名');
            $table->char('start_time',128)->default('')->comment('开始时间');
            $table->char('stop_time',128)->default('')->comment('结束时间');
            $table->char('add_time',128)->default('')->comment('添加时间');
            $table->tinyInteger('status')->unsigned()->default(1)->comment('商品状态');
            $table->tinyInteger('is_del')->unsigned()->default(0)->comment('删除 0未删除1已删除');
            $table->tinyInteger('type')->unsigned()->default(0)->comment('类型 0全款1定金');
            $table->decimal('deposit',12,2)->default(0.00)->comment('定金金额');
            $table->char('pay_start_time',128)->default('')->comment('尾款支付开始时间');
            $table->char('pay_stop_time',128)->default('')->comment('尾款支付结束时间');
            $table->integer('deliver_time')->default(0)->comment('付款后几天后发货');
            $table->integer('num')->unsigned()->default(1)->comment('最多购买几个');
            $table->integer('temp_id')->default(0)->comment('运费模板ID');
            $table->integer('quota')->default(0)->comment('限购总数');
            $table->integer('quota_show')->default(0)->comment('限购总数显示');
            $table->integer('once_num')->default(0)->comment('单次购买个数');
        });
        $this->setTableComment($this->table_name, '预售商品表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
