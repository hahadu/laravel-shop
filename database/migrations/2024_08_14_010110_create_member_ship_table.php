<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'member_ship';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('自增ID');
            $table->char('type',20)->index()->default('month')->comment('会员类别month:月卡会员；quarter:季卡；year:年卡；ever:永久；free:免费');
            $table->char('title',200)->default('')->comment('会员名称');
            $table->integer('vip_day')->default(0)->comment('会员时间(天)');
            $table->decimal('price',12,2)->default(0.00)->comment('原价');
            $table->decimal('pre_price',12,2)->default(0.00)->comment('优惠后价格');
            $table->integer('sort')->default(0)->comment('排序倒序');
            $table->integer('is_del')->default(0)->comment('删除');
            $table->integer('add_time')->default(0)->comment('添加时间');
        });
        $this->setTableComment($this->table_name, '会员类型');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
