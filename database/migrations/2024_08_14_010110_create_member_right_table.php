<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'member_right';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('自增ID');
            $table->char('right_type',100)->default('')->comment('权益类别');
            $table->char('title',200)->default('')->comment(' 权益名称');
            $table->char('show_title',255)->default('')->comment('显示权益名称');
            $table->char('image',200)->default('')->comment('权益图标');
            $table->char('explain',255)->default('')->comment('权益介绍');
            $table->integer('number')->default(1)->comment('规则数字');
            $table->integer('sort')->default(0)->comment('排序倒序');
            $table->tinyInteger('status')->default(1)->comment('0:禁用，1：启用');
            $table->integer('add_time')->default(0)->comment('添加时间');
        });
        $this->setTableComment($this->table_name, '会员权益');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
