<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'luck_prize';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('奖品主键id');
            $table->tinyInteger('type')->default(1)->comment('奖品类型1：未中奖2：积分3:余额4：红包5:优惠券6：站内商品7：等级经验8：用户等级 9：svip天数');
            $table->integer('lottery_id')->index()->default(0)->comment('抽奖活动id');
            $table->char('name',255)->default('')->comment('奖品名称');
            $table->char('prompt',255)->default('')->comment('中奖提示语');
            $table->char('image',255)->default('')->comment('奖品图片');
            $table->smallInteger('chance')->default(10)->comment('中奖基数');
            $table->smallInteger('total')->default(1)->comment('奖品数量');
            $table->integer('coupon_id')->default(0)->comment('关联优惠券id');
            $table->integer('product_id')->default(0)->comment('关联商品id');
            $table->char('unique',20)->default('')->comment('关联商品规格唯一值');
            $table->integer('num')->default(0)->comment('积分 经验 会员天数');
            $table->smallInteger('sort')->default(0)->comment('排序');
            $table->tinyInteger('status')->default(1)->comment('状态');
            $table->tinyInteger('is_del')->default(0)->comment('是否删除');
            $table->integer('add_time')->default(0)->comment('添加时间');
        });
        $this->setTableComment($this->table_name, '抽奖商品列表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
