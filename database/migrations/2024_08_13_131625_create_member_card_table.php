<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'member_card';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('自增ID');
            $table->integer('card_batch_id')->unsigned()->default(0)->comment('卡批次id');
            $table->char('card_number',20)->default('')->comment('卡号');
            $table->char('card_password',12)->default('')->comment('密码');
            $table->integer('use_uid')->default(0)->comment('使用用户');
            $table->integer('use_time')->default(0)->comment('使用时间');
            $table->tinyInteger('status',1)->default(0)->comment('卡状态：0：冻结；1：激活');
            $table->integer('add_time')->default(0)->comment('添加时间');
            $table->integer('update_time')->default(0)->comment('更新时间');
        });
        $this->setTableComment($this->table_name, '会员卡表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
