<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'system_file';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('文件对比ID');
            $table->char('cthash',32)->default('')->comment('文件内容');
            $table->char('filename',255)->default('')->comment('文价名称');
            $table->char('atime',12)->default('')->comment('上次访问时间');
            $table->char('mtime',12)->default('')->comment('上次修改时间');
            $table->char('ctime',12)->default('')->comment('上次改变时间');
        });
        $this->setTableComment($this->table_name, '文件对比表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
