<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'store_seckill';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('商品秒杀商品表id');
            $table->integer('product_id')->index()->unsigned()->default(0)->comment('商品id');
            $table->char('image',255)->default('')->comment('推荐图');
            $table->char('images',255)->default('')->comment('轮播图');
            $table->char('title',255)->default('')->comment('活动标题');
            $table->char('info',255)->default('')->comment('简介');
            $table->decimal('price',12,2)->unsigned()->default(0.00)->comment('价格');
            $table->decimal('cost',12,2)->unsigned()->default(0.00)->comment('成本');
            $table->decimal('ot_price',12,2)->unsigned()->default(0.00)->comment('原价');
            $table->decimal('give_integral',12,2)->unsigned()->default(0.00)->comment('返多少积分');
            $table->integer('sort')->index()->unsigned()->default(0)->comment('排序');
            $table->integer('stock')->unsigned()->default(0)->comment('库存');
            $table->integer('sales')->unsigned()->default(0)->comment('销量');
            $table->char('unit_name',16)->default('')->comment('单位名');
            $table->decimal('postage',12,2)->unsigned()->default(0.00)->comment('邮费');
            $table->char('start_time',128)->index()->default('')->comment('开始时间');
            $table->char('stop_time',128)->default('')->comment('结束时间');
            $table->char('add_time',128)->index()->default('')->comment('添加时间');
            $table->tinyInteger('status')->unsigned()->default(1)->comment('商品状态');
            $table->tinyInteger('is_postage')->index()->unsigned()->default(0)->comment('是否包邮');
            $table->tinyInteger('is_hot')->index()->unsigned()->default(0)->comment('热门推荐');
            $table->tinyInteger('is_del')->index()->unsigned()->default(0)->comment('删除 0未删除1已删除');
            $table->integer('num')->unsigned()->default(1)->comment('最多秒杀几个');
            $table->tinyInteger('is_show')->index()->unsigned()->default(1)->comment('显示');
            $table->integer('time_id')->default(0)->comment('时间段ID');
            $table->integer('temp_id')->default(0)->comment('运费模板ID');
            $table->decimal('weight',12,2)->default(0.00)->comment('商品重量');
            $table->decimal('volume',12,2)->default(0.00)->comment('商品体积');
            $table->integer('quota')->default(0)->comment('限购总数');
            $table->integer('quota_show')->default(0)->comment('限购总数显示');
            $table->integer('once_num')->default(0)->comment('单次购买个数');
            $table->char('logistics',10)->default('1,2')->comment('物流类型');
            $table->tinyInteger('freight')->default(2)->comment('运费设置');
            $table->char('custom_form',255)->default('')->comment('自定义表单');
            $table->tinyInteger('virtual_type')->default(0)->comment('商品类型');
            $table->tinyInteger('is_commission')->default(0)->comment('是否返佣');
        });
        $this->setTableComment($this->table_name, '商品秒杀商品表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
