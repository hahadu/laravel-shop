<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'store_product_virtual';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('主键id');
            $table->integer('product_id')->default(0)->comment('商品id');
            $table->char('attr_unique',20)->default('')->comment('对应商品规格');
            $table->char('card_no',255)->default('')->comment('卡密卡号');
            $table->char('card_pwd',255)->default('')->comment('卡密密码');
            $table->char('card_unique',32)->default('')->comment('虚拟卡密唯一值');
            $table->char('order_id',255)->default('')->comment('购买订单id');
            $table->integer('uid')->default(0)->comment('购买人id');
        });
        $this->setTableComment($this->table_name, '虚拟商品卡密表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
