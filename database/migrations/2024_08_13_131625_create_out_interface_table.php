<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'out_interface';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('自增id');
            $table->integer('pid')->default(0)->comment('父级pid');
            $table->tinyInteger('type',1)->default(0)->comment('0菜单，1接口');
            $table->char('name',255)->default('')->comment('接口名称');
            $table->text('describe')->nullable()->comment('功能描述');
            $table->char('method',255)->default('')->comment('接口类型');
            $table->char('url',255)->default('')->comment('接口地址');
            $table->text('request_params')->nullable()->comment('请求参数');
            $table->text('return_params')->nullable()->comment('返回参数');
            $table->text('request_example')->nullable()->comment('请求示例');
            $table->text('return_example')->nullable()->comment('返回示例');
            $table->text('error_code')->nullable()->comment('错误返回');
            $table->tinyInteger('is_del',1)->default(0)->comment('是否删除');
        });
        $this->setTableComment($this->table_name, '对外接口');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
