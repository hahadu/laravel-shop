<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'store_coupon_issue';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('自增ID');
            $table->integer('cid')->index()->default(0)->comment('优惠券ID');
            $table->char('coupon_title',255)->default('')->comment('优惠券名称');
            $table->integer('start_time')->index()->default(0)->comment('优惠券领取开启时间');
            $table->integer('end_time')->default(0)->comment('优惠券领取结束时间');
            $table->integer('total_count')->default(0)->comment('优惠券领取数量');
            $table->integer('remain_count')->index()->default(0)->comment('优惠券剩余领取数量');
            $table->integer('receive_limit')->default(0)->comment('每个人个领取的优惠券数量');
            $table->tinyInteger('is_permanent')->default(0)->comment('是否无限张数');
            $table->tinyInteger('status')->index()->default(1)->comment('1 正常 0 未开启 -1 已无效');
            $table->tinyInteger('is_give_subscribe')->default(0)->comment('是否首次关注赠送 0-否(默认) 1-是');
            $table->tinyInteger('is_full_give')->default(0)->comment('是否满赠0-否(默认) 1-是');
            $table->decimal('full_reduction',12,2)->default(0.00)->comment('消费满多少赠送优惠券');
            $table->tinyInteger('is_del')->index()->unsigned()->default(0)->comment('是否删除');
            $table->integer('add_time')->default(0)->comment('优惠券添加时间');
            $table->char('title',64)->default('')->comment('优惠券名称');
            $table->integer('integral')->unsigned()->default(0)->comment('兑换消耗积分值');
            $table->decimal('coupon_price',12,2)->unsigned()->default(0.00)->comment('兑换的优惠券面值');
            $table->decimal('use_min_price',12,2)->unsigned()->default(0.00)->comment('最低消费多少金额可用优惠券');
            $table->integer('coupon_time')->index()->unsigned()->default(0)->comment('优惠券有效期限（单位：天）');
            $table->char('product_id',64)->default('')->comment('所属商品id');
            $table->char('category_id',255)->default('')->comment('分类id');
            $table->tinyInteger('type')->default(0)->comment('优惠券类型 0-通用 1-品类券 2-商品券');
            $table->tinyInteger('receive_type')->default(0)->comment('1 手动领取，2 新人券，3赠送券，4会员券');
            $table->integer('start_use_time')->default(0)->comment('优惠券使用开始时间');
            $table->integer('end_use_time')->default(0)->comment('优惠券使用结束时间');
            $table->integer('sort')->default(0)->comment('排序');
        });
        $this->setTableComment($this->table_name, '优惠券前台领取表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
