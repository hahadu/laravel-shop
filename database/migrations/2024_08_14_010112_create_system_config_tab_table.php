<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'system_config_tab';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('配置分类id');
            $table->integer('pid')->default(0)->comment('上级分类id');
            $table->char('title',255)->default('')->comment('配置分类名称');
            $table->char('eng_title',255)->default('')->comment('配置分类英文名称');
            $table->tinyInteger('status')->unsigned()->default(1)->comment('配置分类状态');
            $table->tinyInteger('info')->unsigned()->default(0)->comment('配置分类是否显示');
            $table->char('icon',30)->default('')->comment('图标');
            $table->integer('type')->default(0)->comment('配置类型');
            $table->integer('sort')->default(0)->comment('排序');
            $table->integer('menus_id')->default(0)->comment('菜单ID');
        });
        $this->setTableComment($this->table_name, '配置分类表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
