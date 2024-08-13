<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'routine_scheme';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('编号');
            $table->char('title',255)->default('')->comment('名称');
            $table->char('path',255)->default('')->comment('小程序页面地址');
            $table->char('url',255)->default('')->comment('生成链接地址');
            $table->integer('add_time')->default(0)->comment('添加时间');
            $table->integer('expire_type')->default(-1)->comment('到期类型');
            $table->integer('expire_interval')->default(0)->comment('到期天数');
            $table->integer('expire_time')->default(0)->comment('到期时间');
            $table->integer('is_del')->default(0)->comment('是否删除');
        });
        $this->setTableComment($this->table_name, '小程序外链');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
