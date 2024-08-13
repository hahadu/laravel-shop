<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'store_integral';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('积分商品ID');
            $table->char('image',256)->default('')->comment('商品图片');
            $table->integer('product_id')->unsigned()->default(0)->comment('商品id');
            $table->char('images',2000)->default('')->comment('轮播图');
            $table->char('title',255)->default('')->comment('活动标题');
            $table->integer('price')->default(0)->comment('兑换积分');
            $table->integer('sort')->unsigned()->default(0)->comment('排序');
            $table->integer('sales')->unsigned()->default(0)->comment('销量');
            $table->char('unit_name',16)->default('')->comment('单位名');
            $table->integer('stock')->unsigned()->default(0)->comment('库存');
            $table->char('add_time',128)->default(0)->comment('添加时间');
            $table->tinyInteger('is_host')->unsigned()->default(0)->comment('推荐');
            $table->tinyInteger('is_show')->unsigned()->default(1)->comment('商品状态');
            $table->tinyInteger('is_del')->unsigned()->default(0)->comment('删除');
            $table->integer('num')->default(0)->comment('最多积分几个');
            $table->integer('quota')->default(0)->comment('限购总数');
            $table->integer('once_num')->default(0)->comment('单次购买个数');
            $table->integer('quota_show')->default(0)->comment('限购显示');
        });
        $this->setTableComment($this->table_name, '积分商品表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
