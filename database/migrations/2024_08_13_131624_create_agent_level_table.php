<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'agent_level';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('自增ID');
            $table->char('name',50)->default('')->comment('等级名称');
            $table->char('image',255)->default('')->comment('背景图');
            $table->smallint('one_brokerage')->default(0)->comment('一级分拥上浮比例');
            $table->decimal('one_brokerage_percent',10,2)->default(0.00)->comment('一级分佣比例');
            $table->smallint('two_brokerage')->default(0)->comment('二级分拥上浮比例');
            $table->decimal('two_brokerage_percent',10,2)->default(0.00)->comment('二级分佣比例');
            $table->smallint('grade')->default(0)->comment('等级');
            $table->tinyInteger('status',1)->default(1)->comment('状态');
            $table->tinyInteger('is_del',1)->default(0)->comment('是否删除');
            $table->integer('add_time')->default(0)->comment('添加时间');
        });
        $this->setTableComment($this->table_name, '分销员等级表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
