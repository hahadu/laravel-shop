<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'system_group_data';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('组合数据详情ID');
            $table->integer('gid')->default(0)->comment('对应的数据组id');
            $table->text('value')->nullable()->comment('数据组对应的数据值（json数据）');
            $table->integer('add_time')->default(0)->comment('添加数据时间');
            $table->integer('sort')->default(0)->comment('数据排序');
            $table->tinyInteger('status')->default(1)->comment('状态（1：开启；2：关闭；）');
        });
        $this->setTableComment($this->table_name, '组合数据详情表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
