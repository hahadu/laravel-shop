<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'system_timer';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('');
            $table->char('name',255)->default('')->comment('定时器名称');
            $table->char('mark',255)->default('')->comment('标签');
            $table->char('content',255)->default('')->comment('说明');
            $table->tinyInteger('type',1)->default(0)->comment('周期状态 1=每隔多少秒 2=每隔多少分钟 3=每隔多少小时 4=每隔多少天 5=每天几点执行 6=每周周几几点执行 7=每月几号几点执行');
            $table->integer('month')->default(0)->comment('月');
            $table->integer('week')->default(0)->comment('周');
            $table->integer('day')->default(0)->comment('日');
            $table->integer('hour')->default(0)->comment('时');
            $table->integer('minute')->default(0)->comment('分');
            $table->integer('second')->default(0)->comment('秒');
            $table->integer('last_execution_time')->default(0)->comment('上次执行时间');
            $table->integer('next_execution_time')->default(0)->comment('下次执行时间');
            $table->integer('add_time')->default(0)->comment('添加时间');
            $table->tinyInteger('is_del',1)->default(0)->comment('是否删除');
            $table->tinyInteger('is_open',1)->default(0)->comment('是否开启');
            $table->text('customCode')->comment('执行代码');
            $table->char('timeStr',255)->default('')->comment('时间代码');
        });
        $this->setTableComment($this->table_name, '定时器');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
