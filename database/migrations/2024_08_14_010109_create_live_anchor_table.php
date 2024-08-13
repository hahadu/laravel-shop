<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'live_anchor';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('自增ID');
            $table->char('name',50)->default('')->comment('主播名称');
            $table->char('cover_img',255)->default('')->comment('主播图像');
            $table->char('wechat',50)->default('')->comment('主播微信号');
            $table->char('phone',32)->default('')->comment('手机号');
            $table->tinyInteger('is_show')->default(1)->comment('是否显示');
            $table->tinyInteger('is_del')->default(0)->comment('是否删除');
            $table->integer('add_time')->default(0)->comment('添加时间');
        });
        $this->setTableComment($this->table_name, '直播主播表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
