<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'luck_lottery_record';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('自增ID');
            $table->integer('uid')->index()->default(0)->comment('用户uid');
            $table->integer('lottery_id')->index()->default(0)->comment('活动id');
            $table->integer('prize_id')->index()->default(0)->comment('奖品id');
            $table->tinyInteger('type')->default(1)->comment('奖品类型1：未中奖2：积分3:余额4：红包5:优惠券6：站内商品7：等级经验8：用户等级 9：svip天数');
            $table->tinyInteger('is_receive')->default(0)->comment('是否领取');
            $table->integer('receive_time')->default(0)->comment('领取时间');
            $table->text('receive_info')->nullable()->comment('收获地址、备注等');
            $table->tinyInteger('is_deliver')->default(0)->comment('是否发货');
            $table->integer('deliver_time')->default(0)->comment('发货处理时间');
            $table->text('deliver_info')->nullable()->comment('发货单号、备注等');
            $table->integer('add_time')->default(0)->comment('添加时间');
        });
        $this->setTableComment($this->table_name, '抽奖记录表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
