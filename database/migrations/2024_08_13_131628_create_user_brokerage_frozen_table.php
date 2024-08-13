<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'user_brokerage_frozen';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('自增ID');
            $table->integer('uid')->index()->default(0)->comment('用户uid');
            $table->decimal('price',12,2)->default(0.00)->comment('金额');
            $table->integer('uill_id')->default(0)->comment('关联id');
            $table->integer('frozen_time')->default(0)->comment('冻结到期时间');
            $table->tinyInteger('status',1)->default(0)->comment('是否有效');
            $table->integer('add_time')->default(0)->comment('添加时间');
            $table->char('order_id',50)->default('')->comment('订单id');
        });
        $this->setTableComment($this->table_name, '用户佣金冻结记录表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
