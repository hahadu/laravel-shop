<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'app_version';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('自增ID');
            $table->char('version',20)->default('')->comment('版本号');
            $table->tinyInteger('platform',1)->default(0)->comment('平台类型:1.安卓 2.IOS');
            $table->text('info')->nullable()->comment('升级信息');
            $table->char('url',1000)->default('')->comment('下载链接');
            $table->tinyInteger('is_force',1)->default(1)->comment('是否强制升级');
            $table->tinyInteger('is_new',1)->default(0)->comment('是否最新');
            $table->tinyInteger('is_del',1)->default(0)->comment('是否删除');
            $table->integer('add_time')->default(0)->comment('添加时间');
        });
        $this->setTableComment($this->table_name, 'APP版本表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
