<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'store_product_coupon';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('自增ID');
            $table->integer('product_id')->default(0)->comment('商品id');
            $table->integer('issue_coupon_id')->default(0)->comment('优惠劵id');
            $table->integer('add_time')->default(0)->comment('添加时间');
            $table->char('title',255)->default('')->comment('优惠券名称');
        });
        $this->setTableComment($this->table_name, '商品关联优惠券表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
