<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'store_combination';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('自增ID');
            $table->integer('product_id')->unsigned()->default(0)->comment('商品id');
            $table->integer('mer_id')->unsigned()->default(0)->comment('商户id');
            $table->char('image',255)->default('')->comment('推荐图');
            $table->char('images',2000)->default('')->comment('轮播图');
            $table->char('title',255)->default('')->comment('活动标题');
            $table->char('attr',255)->default('')->comment('活动属性');
            $table->integer('people')->unsigned()->default(0)->comment('参团人数');
            $table->char('info',255)->default('')->comment('简介');
            $table->decimal('price',12,2)->unsigned()->default(0.00)->comment('价格');
            $table->integer('sort')->unsigned()->default(0)->comment('排序');
            $table->integer('sales')->unsigned()->default(0)->comment('销量');
            $table->integer('stock')->unsigned()->default(0)->comment('库存');
            $table->char('add_time',128)->default(0)->comment('添加时间');
            $table->tinyInteger('is_host')->unsigned()->default(0)->comment('推荐');
            $table->tinyInteger('is_show')->unsigned()->default(1)->comment('商品状态');
            $table->tinyInteger('is_del')->unsigned()->default(0)->comment('是否删除');
            $table->tinyInteger('combination')->unsigned()->default(1)->comment('拼团');
            $table->tinyInteger('mer_use')->unsigned()->default(0)->comment('商户是否可用1可用0不可用');
            $table->tinyInteger('is_postage')->unsigned()->default(0)->comment('是否包邮1是0否');
            $table->decimal('postage',12,2)->unsigned()->default(0.00)->comment('邮费');
            $table->integer('start_time')->unsigned()->default(0)->comment('拼团开始时间');
            $table->integer('stop_time')->unsigned()->default(0)->comment('拼团结束时间');
            $table->integer('effective_time')->default(0)->comment('拼团订单有效时间');
            $table->integer('cost')->unsigned()->default(0)->comment('拼图商品成本');
            $table->integer('browse')->default(0)->comment('浏览量');
            $table->char('unit_name',32)->default('')->comment('单位名');
            $table->integer('temp_id')->default(0)->comment('运费模板ID');
            $table->decimal('weight',12,2)->default(0.00)->comment('重量');
            $table->decimal('volume',12,2)->default(0.00)->comment('体积');
            $table->integer('num')->default(0)->comment('单次购买数量');
            $table->integer('once_num')->default(0)->comment('每个订单可购买数量');
            $table->integer('quota')->default(0)->comment('限购总数');
            $table->integer('quota_show')->default(0)->comment('限量总数显示');
            $table->integer('virtual')->default(100)->comment('虚拟成团百分比');
            $table->char('logistics',11)->default('1,2')->comment('物流方式');
            $table->tinyInteger('freight',1)->default(2)->comment('运费设置');
            $table->char('custom_form',2000)->default('')->comment('自定义表单');
            $table->tinyInteger('virtual_type',1)->default(0)->comment('商品类型');
            $table->tinyInteger('is_commission',1)->default(0)->comment('拼团是否返佣');
            $table->integer('head_commission')->default(0)->comment('团长佣金比例');
        });
        $this->setTableComment($this->table_name, '拼团商品表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
