<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'store_service_speechcraft';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('自增ID');
            $table->integer('kefu_id')->index()->default(0)->comment('0为全局话术');
            $table->integer('cate_id')->index()->default(0)->comment('0为不分类全局话术');
            $table->char('title',100)->default('')->comment('话术标题');
            $table->char('message',255)->default('')->comment('话术内容');
            $table->integer('sort')->default(0)->comment('排序');
            $table->integer('add_time')->default(0)->comment('添加时间');
        });
        $this->setTableComment($this->table_name, '客服话术');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
