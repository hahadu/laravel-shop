<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'user_search';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('自增ID');
            $table->integer('uid')->default(0)->comment('用户uid');
            $table->char('keyword',255)->default('')->comment('搜索关键词');
            $table->char('vicword',1000)->default('')->comment('关键词分词');
            $table->integer('num')->default(1)->comment('搜索次数');
            $table->text('result')->nullable()->comment('搜索结果');
            $table->tinyInteger('is_del',1)->default(0)->comment('删除');
            $table->integer('add_time')->default(0)->comment('时间');
        });
        $this->setTableComment($this->table_name, '用户搜索记录表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
