<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'store_bargain';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('砍价商品ID');
            $table->integer('product_id')->unsigned()->default(0)->comment('关联商品ID');
            $table->char('title',255)->default('')->comment('砍价活动名称');
            $table->char('image',150)->default('')->comment('砍价活动图片');
            $table->char('unit_name',16)->default('')->comment('单位名称');
            $table->integer('stock')->unsigned()->default(0)->comment('库存');
            $table->integer('sales')->unsigned()->default(0)->comment('销量');
            $table->char('images',255)->default('')->comment('砍价商品轮播图');
            $table->integer('start_time')->unsigned()->default(0)->comment('砍价开启时间');
            $table->integer('stop_time')->unsigned()->default(0)->comment('砍价结束时间');
            $table->char('store_name',255)->default('')->comment('砍价商品名称');
            $table->decimal('price',12,2)->unsigned()->default(0.00)->comment('砍价金额');
            $table->decimal('min_price',12,2)->unsigned()->default(0.00)->comment('砍价商品最低价');
            $table->integer('num')->unsigned()->default(1)->comment('可购买砍价商品数量');
            $table->decimal('bargain_max_price',12,2)->unsigned()->default(0.00)->comment('用户每次砍价的最大金额');
            $table->decimal('bargain_min_price',12,2)->unsigned()->default(0.00)->comment('用户每次砍价的最小金额');
            $table->integer('bargain_num')->unsigned()->default(1)->comment('用户帮砍的次数');
            $table->tinyInteger('status')->unsigned()->default(1)->comment('砍价状态 0(到砍价时间不自动开启)  1(到砍价时间自动开启时间)');
            $table->decimal('give_integral',12,2)->unsigned()->default(0.00)->comment('反多少积分');
            $table->char('info',255)->default('')->comment('砍价活动简介');
            $table->decimal('cost',12,2)->unsigned()->default(0.00)->comment('成本价');
            $table->integer('sort')->unsigned()->default(0)->comment('排序');
            $table->tinyInteger('is_hot')->unsigned()->default(0)->comment('是否推荐0不推荐1推荐');
            $table->tinyInteger('is_del')->unsigned()->default(0)->comment('是否删除 0未删除 1删除');
            $table->integer('add_time')->unsigned()->default(0)->comment('添加时间');
            $table->tinyInteger('is_postage')->unsigned()->default(1)->comment('是否包邮 0不包邮 1包邮');
            $table->decimal('postage',12,2)->unsigned()->default(0.00)->comment('邮费');
            $table->text('rule')->nullable()->comment('砍价规则');
            $table->integer('look')->unsigned()->default(0)->comment('砍价商品浏览量');
            $table->integer('share')->unsigned()->default(0)->comment('砍价商品分享量');
            $table->integer('temp_id')->default(0)->comment('运费模板ID');
            $table->decimal('weight',12,2)->default(0.00)->comment('重量');
            $table->decimal('volume',12,2)->default(0.00)->comment('体积');
            $table->integer('quota')->default(0)->comment('限购总数');
            $table->integer('quota_show')->default(0)->comment('限量总数显示');
            $table->integer('people_num')->default(1)->comment('用户帮砍的次数');
            $table->char('logistics',11)->default('1,2')->comment('物流方式');
            $table->tinyInteger('freight')->default(2)->comment('运费设置');
            $table->char('custom_form',255)->default('')->comment('自定义表单');
            $table->tinyInteger('virtual_type')->default(0)->comment('商品类型');
            $table->tinyInteger('is_commission')->default(0)->comment('是否返佣');
        });
        $this->setTableComment($this->table_name, '砍价表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
