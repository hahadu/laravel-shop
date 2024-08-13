<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'store_bargain_user';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('用户参与砍价表ID');
            $table->integer('uid')->unsigned()->default(0)->comment('用户ID');
            $table->integer('bargain_id')->unsigned()->default(0)->comment('砍价商品id');
            $table->decimal('bargain_price_min',12,2)->unsigned()->default(0.00)->comment('砍价的最低价');
            $table->decimal('bargain_price',12,2)->default(0.00)->comment('砍价金额');
            $table->decimal('price',12,2)->unsigned()->default(0.00)->comment('砍掉的价格');
            $table->tinyInteger('status')->unsigned()->default(0)->comment('状态 1参与中 2 活动结束参与失败 3活动结束参与成功');
            $table->integer('add_time')->unsigned()->default(0)->comment('参与时间');
            $table->tinyInteger('is_del')->default(0)->comment('是否取消');
        });
        $this->setTableComment($this->table_name, '用户参与砍价表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
