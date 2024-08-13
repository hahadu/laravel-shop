<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'store_product_reply';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('评论ID');
            $table->integer('uid')->default(0)->comment('用户ID');
            $table->integer('oid')->default(0)->comment('订单ID');
            $table->char('unique',32)->default('')->comment('唯一id');
            $table->integer('product_id')->default(0)->comment('商品id');
            $table->char('reply_type',32)->default('product')->comment('某种商品类型(普通商品、秒杀商品）');
            $table->tinyInteger('product_score')->index()->default(0)->comment('商品分数');
            $table->tinyInteger('service_score')->index()->default(0)->comment('服务分数');
            $table->char('comment',255)->default('')->comment('评论内容');
            $table->text('pics')->nullable()->comment('评论图片');
            $table->integer('add_time')->index()->default(0)->comment('评论时间');
            $table->char('merchant_reply_content',255)->default('')->comment('管理员回复内容');
            $table->integer('merchant_reply_time')->default(0)->comment('管理员回复时间');
            $table->tinyInteger('is_del')->index()->unsigned()->default(0)->comment('0未删除1已删除');
            $table->tinyInteger('is_reply')->default(0)->comment('0未回复1已回复');
            $table->char('nickname',64)->default('')->comment('用户名称');
            $table->char('avatar',255)->default('')->comment('用户头像');
            $table->char('suk',255)->default('')->comment('规格名称');
            $table->tinyInteger('status')->default(0)->comment('评论状态');
        });
        $this->setTableComment($this->table_name, '评论表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
