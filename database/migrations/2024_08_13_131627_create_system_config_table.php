<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'system_config';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('配置id');
            $table->char('menu_name',255)->default('')->comment('字段名称');
            $table->char('type',255)->default('')->comment('类型(文本框,单选按钮...)');
            $table->char('input_type',20)->default('input')->comment('表单类型');
            $table->integer('config_tab_id')->unsigned()->default(0)->comment('配置分类id');
            $table->char('parameter',255)->default('')->comment('规则 单选框和多选框');
            $table->tinyInteger('upload_type')->unsigned()->default(1)->comment('上传文件格式1单图2多图3文件');
            $table->char('required',255)->default('')->comment('规则');
            $table->integer('width')->unsigned()->default(0)->comment('多行文本框的宽度');
            $table->integer('high')->unsigned()->default(0)->comment('多行文框的高度');
            $table->char('value',5000)->default('')->comment('默认值');
            $table->char('info',255)->default('')->comment('配置名称');
            $table->char('desc',255)->default('')->comment('配置简介');
            $table->integer('sort')->unsigned()->default(0)->comment('排序');
            $table->tinyInteger('status')->unsigned()->default(0)->comment('是否隐藏');
            $table->integer('level')->default(0)->comment('配置层级0顶级1次级');
            $table->integer('link_id')->default(0)->comment('关联上级配置id');
            $table->integer('link_value')->default(0)->comment('关联上级配置的值');
        });
        $this->setTableComment($this->table_name, '配置表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
