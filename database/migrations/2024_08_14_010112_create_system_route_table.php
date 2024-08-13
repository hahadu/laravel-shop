<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'system_route';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('');
            $table->integer('cate_id')->default(0)->comment('分类');
            $table->char('app_name',20)->default('api')->comment('应用名');
            $table->char('name',50)->default('')->comment('路由名称');
            $table->text('describe')->comment('功能描述');
            $table->char('path',100)->index()->default('')->comment('路由路径');
            $table->enum('method','POST','GET','DELETE','PUT','*')->default('GET')->comment('路由请求方式');
            $table->char('file_path',255)->default('')->comment('文件路径');
            $table->char('action',255)->default('')->comment('方法名称');
            $table->longText('query')->comment('get请求参数');
            $table->longText('header')->comment('header');
            $table->longText('request')->comment('请求数据');
            $table->char('request_type',100)->default('')->comment('请求类型');
            $table->longText('response')->comment('返回数据');
            $table->longText('request_example')->comment('请求示例');
            $table->longText('response_example')->comment('返回示例');
            $table->tinyInteger('type')->default(0)->comment('类型');
            $table->timestamp('add_time')->nullable()->comment('添加时间');
            $table->timestamp('deleted_at')->nullable()->comment('删除字段');
            $table->longText('error_code')->comment('错误码');
        });
        $this->setTableComment($this->table_name, '路由规则表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
