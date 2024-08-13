<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'store_coupon_product';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->integer('coupon_id')->index()->default(0)->comment('优惠券模板id');
            $table->integer('product_id')->default(0)->comment('商品id');
            $table->integer('category_id')->default(0)->comment('分类id');
        });
        $this->setTableComment($this->table_name, '优惠券模板关联列表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
