<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'upgrade_log';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('自增ID');
            $table->char('title',120)->default('')->comment('标题说明');
            $table->text('content')->comment('更新内容');
            $table->char('first_version',3)->default('')->comment('版本号第一位');
            $table->char('second_version',3)->default('')->comment('版本号第二位');
            $table->char('third_version',3)->default('')->comment('版本号第三位');
            $table->char('fourth_version',3)->default('')->comment('版本号第四位');
            $table->text('error_data')->comment('错误内容');
            $table->integer('upgrade_time')->default(0)->comment('升级时间');
            $table->char('package_link',255)->default('')->comment('文件备份地址');
            $table->char('data_link',255)->default('')->comment('数据备份地址');
        });
        $this->setTableComment($this->table_name, '升级记录');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
