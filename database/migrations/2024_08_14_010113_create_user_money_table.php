<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'user_money';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('用户余额id');
            $table->integer('uid')->index()->unsigned()->default(0)->comment('用户uid');
            $table->char('link_id',32)->default(0)->comment('关联id');
            $table->char('type',64)->index()->default('')->comment('明细类型');
            $table->char('title',64)->default('')->comment('账单标题');
            $table->decimal('number',12,2)->unsigned()->default(0.00)->comment('明细数字');
            $table->decimal('balance',12,2)->unsigned()->default(0.00)->comment('剩余');
            $table->tinyInteger('pm')->index()->unsigned()->default(0)->comment('0 = 支出 1 = 获得');
            $table->char('mark',255)->default('')->comment('备注');
            $table->tinyInteger('status')->index()->default(1)->comment('0 = 带确定 1 = 有效 -1 = 无效');
            $table->integer('add_time')->index()->unsigned()->default(0)->comment('添加时间');
        });
        $this->setTableComment($this->table_name, '用户余额账单表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
