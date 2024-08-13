<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'auxiliary';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('自增ID');
            $table->integer('binding_id')->default(0)->comment('绑定id');
            $table->integer('relation_id')->default(0)->comment('关联id');
            $table->tinyInteger('type')->default(0)->comment('类型0=客服转接辅助，1=商品和分类辅助，2=优惠券和商品辅助');
            $table->char('other',255)->default('')->comment('其他数据为json');
            $table->integer('update_time')->default(0)->comment('更新时间');
            $table->integer('add_time')->default(0)->comment('添加时间');
        });
        $this->setTableComment($this->table_name, '辅助表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
