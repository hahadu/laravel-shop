<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'member_card_batch';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('自增ID');
            $table->char('title',100)->default(0)->comment('批次名称');
            $table->integer('total_num')->unsigned()->default(0)->comment('生成卡数量');
            $table->integer('use_start_time')->unsigned()->default(7)->comment('体验开始时间');
            $table->integer('use_end_time')->default(0)->comment('体验结束时间');
            $table->integer('use_day')->default(0)->comment('体验天数');
            $table->integer('use_num')->unsigned()->default(0)->comment('使用');
            $table->tinyInteger('status',1)->default(0)->comment('是否生效,控制此批次所有卡0：不生效；1：生效');
            $table->integer('sort')->unsigned()->default(0)->comment('排序');
            $table->char('qrcode',255)->default('')->comment('二维码图路径');
            $table->char('remark',512)->default('')->comment('备注');
            $table->integer('add_time')->default(0)->comment('添加时间');
            $table->integer('update_time')->default(0)->comment('更新时间');
        });
        $this->setTableComment($this->table_name, '会员卡批次表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
