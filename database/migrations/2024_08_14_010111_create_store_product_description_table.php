<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'store_product_description';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->integer('product_id')->index()->default(0)->comment('商品ID');
            $table->text('description')->nullable()->comment('商品详情');
            $table->tinyInteger('type')->default(0)->comment('商品类型');
        });
        $this->setTableComment($this->table_name, '商品详情表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
