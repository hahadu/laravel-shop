<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'store_coupon_user';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('优惠券发放记录id');
            $table->integer('cid')->index()->unsigned()->default(0)->comment('兑换的项目id');
            $table->integer('uid')->index()->unsigned()->default(0)->comment('优惠券所属用户');
            $table->char('coupon_title',32)->default('')->comment('优惠券名称');
            $table->decimal('coupon_price',12,2)->unsigned()->default(0.00)->comment('优惠券的面值');
            $table->decimal('use_min_price',12,2)->unsigned()->default(0.00)->comment('最低消费多少金额可用优惠券');
            $table->integer('add_time')->index()->unsigned()->default(0)->comment('优惠券创建时间');
            $table->integer('start_time')->default(0)->comment('优惠券开始时间');
            $table->integer('end_time')->index()->unsigned()->default(0)->comment('优惠券结束时间');
            $table->integer('use_time')->unsigned()->default(0)->comment('使用时间');
            $table->char('type',32)->default('send')->comment('获取方式');
            $table->tinyInteger('status',1)->index()->default(0)->comment('状态（0：未使用，1：已使用, 2:已过期）');
            $table->tinyInteger('is_fail')->index()->unsigned()->default(0)->comment('是否有效');
        });
        $this->setTableComment($this->table_name, '优惠券发放记录表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
