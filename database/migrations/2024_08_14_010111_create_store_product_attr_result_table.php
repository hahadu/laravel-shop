<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'store_product_attr_result';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('主键id');
            $table->integer('product_id')->index()->unsigned()->default(0)->comment('商品ID');
            $table->longText('result')->nullable()->comment('商品属性参数');
            $table->integer('change_time')->unsigned()->default(0)->comment('上次修改时间');
            $table->tinyInteger('type')->default(0)->comment('活动类型 0=商品，1=秒杀，2=砍价，3=拼团');
        });
        $this->setTableComment($this->table_name, '商品属性详情表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
