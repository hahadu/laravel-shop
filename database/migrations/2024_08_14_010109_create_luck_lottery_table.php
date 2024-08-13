<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'luck_lottery';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('自增ID');
            $table->tinyInteger('type')->default(1)->comment('抽奖类型1:九宫格2：大转盘3：九宫格升级版 4：幸运翻牌');
            $table->char('name',255)->default('')->comment('抽奖活动名称');
            $table->char('desc',255)->default('')->comment('活动描述');
            $table->char('image',255)->default('')->comment('活动背景图');
            $table->tinyInteger('factor')->default(1)->comment('抽奖消耗：1:积分2：余额3：下单支付成功4：关注5：订单评价');
            $table->smallInteger('factor_num')->default(10)->comment('获取一次抽奖的条件数量');
            $table->tinyInteger('attends_user')->default(1)->comment('参与用户1：所有2：部分');
            $table->text('user_level')->nullable()->comment('参与用户等级');
            $table->text('user_label')->nullable()->comment('参与用户标签');
            $table->tinyInteger('is_svip')->default(1)->comment('参与用户是否付费会员');
            $table->smallInteger('prize_num')->default(0)->comment('奖品数量');
            $table->integer('start_time')->default(0)->comment('开始时间');
            $table->integer('end_time')->default(0)->comment('结束时间');
            $table->tinyInteger('lottery_num_term')->default(1)->comment('抽奖次数限制：1：每天2：每人');
            $table->smallInteger('lottery_num')->default(1)->comment('抽奖次数');
            $table->smallInteger('spread_num')->default(1)->comment('关注推广获取抽奖次数');
            $table->tinyInteger('is_all_record')->default(1)->comment('中奖纪录展示');
            $table->tinyInteger('is_personal_record')->default(1)->comment('个人中奖纪录展示');
            $table->tinyInteger('is_content')->default(1)->comment('活动规格是否展示');
            $table->longText('content')->nullable()->comment('活动文案抽奖协议之类');
            $table->tinyInteger('status')->default(1)->comment('状态');
            $table->smallInteger('sort')->default(0)->comment('排序');
            $table->tinyInteger('is_del')->default(0)->comment('是否删除');
            $table->integer('add_time')->default(0)->comment('添加时间');
        });
        $this->setTableComment($this->table_name, '抽奖列表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
