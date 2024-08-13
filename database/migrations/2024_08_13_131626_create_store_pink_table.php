<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'store_pink';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('自增ID');
            $table->integer('uid')->unsigned()->default(0)->comment('用户id');
            $table->char('nickname',64)->default('')->comment('用户昵称');
            $table->char('avatar',256)->default('')->comment('用户头像');
            $table->char('order_id',32)->default('')->comment('订单id 生成');
            $table->integer('order_id_key')->unsigned()->default(0)->comment('订单id  数据库');
            $table->integer('total_num')->unsigned()->default(0)->comment('购买商品个数');
            $table->decimal('total_price',12,2)->unsigned()->default(0.00)->comment('购买总金额');
            $table->integer('cid')->unsigned()->default(0)->comment('拼团商品id');
            $table->integer('pid')->unsigned()->default(0)->comment('商品id');
            $table->integer('people')->unsigned()->default(0)->comment('拼图总人数');
            $table->decimal('price',12,2)->unsigned()->default(0.00)->comment('拼团商品单价');
            $table->char('add_time',24)->default(0)->comment('开始时间');
            $table->char('stop_time',24)->default(0)->comment('结束时间');
            $table->integer('k_id')->unsigned()->default(0)->comment('团长id 0为团长');
            $table->tinyInteger('is_tpl')->unsigned()->default(0)->comment('是否发送模板消息0未发送1已发送');
            $table->tinyInteger('is_refund')->unsigned()->default(0)->comment('是否退款 0未退款 1已退款');
            $table->tinyInteger('status')->unsigned()->default(1)->comment('状态1进行中2已完成3未完成');
            $table->tinyInteger('is_virtual',1)->default(0)->comment('是否虚拟拼团');
        });
        $this->setTableComment($this->table_name, '拼团表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
