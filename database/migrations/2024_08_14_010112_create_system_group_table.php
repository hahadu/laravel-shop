<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'system_group';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('组合数据ID');
            $table->integer('cate_id')->default(0)->comment('分类id');
            $table->char('name',50)->default('')->comment('数据组名称');
            $table->char('info',255)->default('')->comment('数据提示');
            $table->char('config_name',50)->index()->default('')->comment('数据字段');
            $table->text('fields')->nullable()->comment('数据组字段以及类型（json数据）');
        });
        $this->setTableComment($this->table_name, '组合数据表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
