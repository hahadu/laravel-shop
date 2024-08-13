<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'system_file_info';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('自增ID');
            $table->char('name',255)->default('')->comment('目录或文件名称');
            $table->char('path',255)->default('')->comment('目录或文件路径');
            $table->char('full_path',255)->default('')->comment('完整路径');
            $table->char('type',255)->default('')->comment('dir目录1 ,file文件');
            $table->dateTime('created_at')->nullable()->comment('创建时间');
            $table->dateTime('updated_at')->nullable()->comment('修改时间');
            $table->char('mark',255)->default('')->comment('备注');
        });
        $this->setTableComment($this->table_name, '文件管理表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
