<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'diy';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('自增ID');
            $table->char('version',255)->default('')->comment('版本号');
            $table->char('name',255)->default('')->comment('页面名称');
            $table->char('template_name',255)->default('')->comment('模版名称');
            $table->longText('value')->nullable()->comment('页面数据');
            $table->longText('default_value')->nullable()->comment('默认页面数据');
            $table->integer('add_time')->default(0)->comment('添加时间');
            $table->integer('update_time')->default(0)->comment('更新时间');
            $table->tinyInteger('status')->default(0)->comment('是否使用');
            $table->tinyInteger('type')->default(0)->comment('页面类型');
            $table->tinyInteger('is_show')->default(0)->comment('显示首页');
            $table->tinyInteger('is_bg_color')->default(0)->comment('颜色是否选中');
            $table->tinyInteger('is_bg_pic')->default(0)->comment('背景图是否选中');
            $table->char('color_picker',50)->default('')->comment('背景颜色');
            $table->char('bg_pic',255)->default('')->comment('背景图');
            $table->tinyInteger('bg_tab_val')->default(0)->comment('背景图图片样式');
            $table->tinyInteger('is_del')->default(0)->comment('是否删除');
            $table->tinyInteger('order_status')->default(0)->comment('个人中心订单样式');
            $table->tinyInteger('my_banner_status')->default(1)->comment('个人中心banner是否显示');
            $table->tinyInteger('is_diy')->default(0)->comment('是否diy');
            $table->char('title',255)->default('')->comment('diy顶部title');
        });
        $this->setTableComment($this->table_name, 'DIY数据表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
