<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'live_goods';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('自增ID');
            $table->integer('goods_id')->default(0)->comment('微信商品ID');
            $table->integer('audit_id')->default(0)->comment('审核ID');
            $table->integer('product_id')->default(0)->comment('商品id');
            $table->char('name',30)->default('')->comment('商品名称');
            $table->char('cover_img',255)->default('')->comment('商品图片链接');
            $table->char('url',255)->default('')->comment('商品小程序链接');
            $table->tinyInteger('price_type')->default(1)->comment('价格类型（1:一口价，此时读price字段; 2:价格区间，此时price字段为左边界，price2字段为右边界; 3:折扣价，此时price字段为原价，price2字段为现价；）');
            $table->decimal('cost_price',12,2)->default(0.00)->comment('成本价');
            $table->decimal('price',12,2)->default(0.00)->comment('一口价/最低价');
            $table->decimal('price2',12,2)->default(0.00)->comment('最高价');
            $table->tinyInteger('audit_status')->default(0)->comment('审核状态（0：未审核，1：审核中，2:审核通过，3审核失败）');
            $table->tinyInteger('third_part_tag')->default(1)->comment('1、2：表示是为 API 添加商品，否则是直播控制台添加的商品');
            $table->smallInteger('sort')->default(0)->comment('排序');
            $table->tinyInteger('is_show')->default(1)->comment('是否显示');
            $table->tinyInteger('is_del')->default(0)->comment('是否删除');
            $table->integer('add_time')->default(0)->comment('添加时间');
        });
        $this->setTableComment($this->table_name, '直播商品表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
