<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'system_attachment';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->integer('att_id')->autoIncrement()->comment('自增ID');
            $table->char('name',100)->default('')->comment('附件名称');
            $table->char('att_dir',200)->default('')->comment('附件路径');
            $table->char('satt_dir',200)->default('')->comment('压缩图片路径');
            $table->char('att_size',30)->default('')->comment('附件大小');
            $table->char('att_type',30)->default('')->comment('附件类型');
            $table->integer('pid')->default(0)->comment('分类ID0编辑器,1商品图片,2拼团图片,3砍价图片,4秒杀图片,5文章图片,6组合数据图');
            $table->integer('time')->default(0)->comment('上传时间');
            $table->tinyInteger('image_type')->unsigned()->default(1)->comment('图片上传类型 1本地 2七牛云 3OSS 4COS ');
            $table->tinyInteger('module_type')->unsigned()->default(1)->comment('图片上传模块类型 1 后台上传 2 用户生成');
            $table->char('real_name',255)->default('')->comment('原始文件名');
            $table->char('scan_token',32)->default('')->comment('扫码上传的token');
        });
        $this->setTableComment($this->table_name, '附件管理表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
