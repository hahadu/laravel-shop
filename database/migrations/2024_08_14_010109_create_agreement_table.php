<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'agreement';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('自增ID');
            $table->tinyInteger('type')->index()->default(0)->comment('协议类型  1：会员协议,2:代理商协议');
            $table->char('title',200)->default('')->comment('协议名称');
            $table->text('content')->nullable()->comment('协议内容');
            $table->integer('sort')->default(0)->comment('排序倒序');
            $table->tinyInteger('status')->unsigned()->default(1)->comment('1：显示：0：不显示');
            $table->integer('add_time')->default(0)->comment('添加时间');
        });
        $this->setTableComment($this->table_name, '会员协议');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
