<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'system_crud';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('');
            $table->integer('pid')->default(0)->comment('菜单上级id');
            $table->char('name',200)->comment('菜单名称');
            $table->integer('menu_id')->default(0)->comment('主菜单id');
            $table->char('model_name',255)->default('')->comment('模块名');
            $table->char('table_name',50)->comment('表明');
            $table->text('field')->comment('参数内容');
            $table->char('menu_ids',255)->default('')->comment('生成的菜单id');
            $table->char('route_ids',255)->default('')->comment('权限id');
            $table->char('make_path',500)->default('')->comment('文件路径');
            $table->char('table_collation',100)->default('')->comment('字符集');
            $table->char('table_comment',255)->default('')->comment('表备注');
            $table->integer('add_time')->comment('添加时间');
        });
        $this->setTableComment($this->table_name, 'crud生成记录');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
