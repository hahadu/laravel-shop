<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'system_menus';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('菜单ID');
            $table->smallInteger('pid')->index()->unsigned()->default(0)->comment('父级id');
            $table->char('icon',16)->default('')->comment('图标');
            $table->char('menu_name',32)->default('')->comment('按钮名');
            $table->char('module',32)->default('')->comment('模块名');
            $table->char('controller',64)->default('')->comment('控制器');
            $table->char('action',32)->default('')->comment('方法名');
            $table->char('api_url',100)->default('')->comment('api接口地址');
            $table->char('methods',10)->default('')->comment('提交方式POST GET PUT DELETE');
            $table->char('params',128)->default('[]')->comment('参数');
            $table->tinyInteger('sort')->default(1)->comment('排序');
            $table->tinyInteger('is_show')->index()->unsigned()->default(1)->comment('是否为隐藏菜单0=隐藏菜单,1=显示菜单');
            $table->tinyInteger('is_show_path')->default(0)->comment('是否为隐藏菜单供前台使用');
            $table->tinyInteger('access')->index()->unsigned()->default(1)->comment('子管理员是否可用');
            $table->char('menu_path',128)->default('')->comment('路由名称 前端使用');
            $table->char('path',255)->default('')->comment('路径');
            $table->tinyInteger('auth_type')->default(0)->comment('是否为菜单 1菜单 2功能');
            $table->char('header',50)->default('')->comment('顶部菜单标示');
            $table->tinyInteger('is_header')->default(0)->comment('是否顶部菜单1是0否');
            $table->char('unique_auth',150)->default('')->comment('前台唯一标识');
            $table->tinyInteger('is_del')->default(0)->comment('是否删除');
            $table->char('mark',255)->default('')->comment('备注');
        });
        $this->setTableComment($this->table_name, '菜单表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
