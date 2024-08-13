<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'category';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('自增ID');
            $table->integer('pid')->index()->default(0)->comment('上级id');
            $table->integer('owner_id')->default(0)->comment('所属人，为全部');
            $table->char('name',255)->index()->default('')->comment('分类名称');
            $table->integer('sort')->default(0)->comment('排序');
            $table->tinyInteger('type',1)->default(0)->comment('分类类型0=标签分类，1=快捷短语分类');
            $table->text('other')->nullable()->comment('其他参数');
            $table->integer('add_time')->default(0)->comment('添加时间');
        });
        $this->setTableComment($this->table_name, '标签分类');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
