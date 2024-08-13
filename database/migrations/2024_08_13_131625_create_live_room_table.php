<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'live_room';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('自增ID');
            $table->integer('room_id')->unsigned()->default(0)->comment('直播间 id');
            $table->char('name',32)->default('')->comment('直播间名字');
            $table->char('cover_img',255)->default('')->comment('背景图');
            $table->char('share_img',255)->default('')->comment('分享图');
            $table->integer('start_time')->default(0)->comment('直播计划开始时间');
            $table->integer('end_time')->default(0)->comment('直播计划结束时间');
            $table->char('anchor_name',50)->default('')->comment('主播昵称');
            $table->char('anchor_wechat',50)->default('')->comment('主播微信号');
            $table->char('phone',32)->default('')->comment('主播手机号');
            $table->tinyInteger('type')->unsigned()->default(0)->comment('直播间类型 【1: 推流，0：手机直播】');
            $table->tinyInteger('screen_type')->unsigned()->default(1)->comment('横屏、竖屏 【1：横屏，0：竖屏】');
            $table->tinyInteger('close_like')->unsigned()->default(0)->comment('是否关闭点赞');
            $table->tinyInteger('close_goods')->unsigned()->default(0)->comment('是否关闭货架');
            $table->tinyInteger('close_comment')->unsigned()->default(0)->comment('是否关闭评论');
            $table->char('error_msg',255)->default('')->comment('未通过原因');
            $table->tinyInteger('status',1)->default(0)->comment('审核状态0=未审核1=微信审核2=审核通过-1=审核未通过');
            $table->smallint('live_status')->unsigned()->default(102)->comment('直播状态101：直播中，102：未开始，103已结束，104禁播，105：暂停，106：异常，107：已过期');
            $table->char('mark',512)->default('')->comment('备注');
            $table->tinyInteger('replay_status')->unsigned()->default(0)->comment('回放状态');
            $table->smallint('sort')->default(0)->comment('排序');
            $table->tinyInteger('is_show')->unsigned()->default(1)->comment('是否显示');
            $table->tinyInteger('is_del')->unsigned()->default(0)->comment('是否删除');
            $table->integer('add_time')->default(0)->comment('添加时间');
        });
        $this->setTableComment($this->table_name, '直播间表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
