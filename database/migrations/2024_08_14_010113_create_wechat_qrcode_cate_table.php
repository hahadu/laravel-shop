<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'wechat_qrcode_cate';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('主键id');
            $table->char('cate_name',255)->default('')->comment('渠道码分类名称');
            $table->integer('add_time')->default(0)->comment('添加时间');
            $table->tinyInteger('is_del')->default(0)->comment('是否删除');
        });
        $this->setTableComment($this->table_name, '二维码类型表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
