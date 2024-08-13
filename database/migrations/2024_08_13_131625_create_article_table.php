<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'article';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('文章管理ID');
            $table->char('cid',255)->default(0)->comment('分类id');
            $table->char('title',255)->default('')->comment('文章标题');
            $table->char('author',255)->default('')->comment('文章作者');
            $table->char('image_input',255)->default('')->comment('文章图片');
            $table->char('synopsis',255)->default('')->comment('文章简介');
            $table->char('share_title',255)->default('')->comment('文章分享标题');
            $table->char('share_synopsis',255)->default('')->comment('文章分享简介');
            $table->char('visit',255)->default(0)->comment('浏览次数');
            $table->integer('sort')->unsigned()->default(0)->comment('排序');
            $table->char('url',255)->default('')->comment('原文链接');
            $table->tinyInteger('status')->unsigned()->default(1)->comment('状态');
            $table->char('add_time',255)->default('')->comment('添加时间');
            $table->tinyInteger('hide')->unsigned()->default(0)->comment('是否隐藏');
            $table->integer('admin_id')->unsigned()->default(0)->comment('管理员id');
            $table->integer('mer_id')->unsigned()->default(0)->comment('商户id');
            $table->integer('product_id')->default(0)->comment('商品关联id');
            $table->tinyInteger('is_hot')->unsigned()->default(0)->comment('是否热门(小程序)');
            $table->tinyInteger('is_banner')->unsigned()->default(0)->comment('是否轮播图(小程序)');
        });
        $this->setTableComment($this->table_name, '文章管理表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
