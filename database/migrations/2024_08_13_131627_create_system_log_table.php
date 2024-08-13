<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'system_log';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('管理员操作记录ID');
            $table->integer('admin_id')->index()->unsigned()->default(0)->comment('管理员id');
            $table->char('admin_name',64)->default('')->comment('管理员姓名');
            $table->char('path',128)->default('')->comment('链接');
            $table->char('page',64)->default('')->comment('行为');
            $table->char('method',12)->default('')->comment('访问类型');
            $table->char('ip',16)->default('')->comment('登录IP');
            $table->char('type',32)->index()->default('')->comment('类型');
            $table->integer('add_time')->index()->unsigned()->default(0)->comment('操作时间');
            $table->integer('merchant_id')->unsigned()->default(0)->comment('商户id');
        });
        $this->setTableComment($this->table_name, '管理员操作记录表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
