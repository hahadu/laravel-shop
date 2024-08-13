<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'system_notice';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('通知模板id');
            $table->char('title',64)->default('')->comment('通知标题');
            $table->char('type',64)->index()->default('')->comment('通知类型');
            $table->char('icon',16)->default('')->comment('图标');
            $table->char('url',64)->default('')->comment('链接');
            $table->char('table_title',255)->default('')->comment('通知数据');
            $table->char('template',64)->default('')->comment('通知模板');
            $table->char('push_admin',128)->default('')->comment('通知管理员id');
            $table->tinyInteger('status')->index()->unsigned()->default(1)->comment('状态');
        });
        $this->setTableComment($this->table_name, '通知模板表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
