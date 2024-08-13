<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'wechat_qrcode';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('编号');
            $table->integer('uid')->default(0)->comment('用户id');
            $table->char('name',255)->default('')->comment('二维码名称');
            $table->char('image',255)->default('')->comment('二维码图片');
            $table->integer('cate_id')->default(0)->comment('分类id');
            $table->char('label_id',32)->default('')->comment('标签id');
            $table->char('type',32)->default('')->comment('回复类型');
            $table->text('content')->nullable()->comment('回复内容');
            $table->text('data')->nullable()->comment('发送数据');
            $table->integer('follow')->default(0)->comment('关注人数');
            $table->integer('scan')->default(0)->comment('扫码人数');
            $table->integer('add_time')->default(0)->comment('添加时间');
            $table->integer('continue_time')->default(0)->comment('有效期');
            $table->integer('end_time')->default(0)->comment('到期时间');
            $table->tinyInteger('status')->default(1)->comment('状态');
            $table->tinyInteger('is_del')->default(0)->comment('是否删除');
        });
        $this->setTableComment($this->table_name, '二维码表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
