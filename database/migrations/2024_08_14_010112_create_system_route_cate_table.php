<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'system_route_cate';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('');
            $table->integer('pid')->default(0)->comment('上级id');
            $table->char('app_name',20)->index()->default('')->comment('应用名');
            $table->char('name',50)->default('')->comment('名称');
            $table->char('mark',32)->default('')->comment('分组标识');
            $table->char('path',255)->default('')->comment('路径');
            $table->integer('sort')->default(0)->comment('');
            $table->integer('add_time')->default(0)->comment('添加时间');
        });
        $this->setTableComment($this->table_name, '路由规分类表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
