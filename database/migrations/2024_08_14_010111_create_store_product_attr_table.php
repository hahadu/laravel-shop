<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'store_product_attr';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('自增ID');
            $table->integer('product_id')->unsigned()->default(0)->comment('商品ID');
            $table->char('attr_name',32)->default('')->comment('属性名');
            $table->longText('attr_values')->nullable()->comment('属性值');
            $table->tinyInteger('type')->default(0)->comment('活动类型 0=商品，1=秒杀，2=砍价，3=拼团');
        });
        $this->setTableComment($this->table_name, '商品属性表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
