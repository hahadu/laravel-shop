<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'system_crud_data';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('');
            $table->integer('cid')->default(0)->comment('列表id');
            $table->integer('pid')->default(0)->comment('上级id');
            $table->char('name',100)->default('')->comment('名称');
            $table->text('value')->comment('数据内容JSON');
            $table->integer('sort')->default(0)->comment('排序');
            $table->integer('add_time')->comment('添加时间');
        });
        $this->setTableComment($this->table_name, 'crud数据字典');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
