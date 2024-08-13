<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'lang_type';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('自增ID');
            $table->char('language_name',50)->default('')->comment('语言名称');
            $table->char('file_name',20)->nullable()->default('')->comment('配置文件名称');
            $table->tinyInteger('status')->default(0)->comment('1启用0禁用');
            $table->tinyInteger('is_default')->default(0)->comment('是否默认语言');
            $table->tinyInteger('is_del')->default(0)->comment('是否删除');
        });
        $this->setTableComment($this->table_name, '语言类型');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
