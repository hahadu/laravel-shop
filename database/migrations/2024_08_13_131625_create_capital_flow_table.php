<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'capital_flow';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('编号');
            $table->char('flow_id',32)->default('')->comment('流水id');
            $table->char('order_id',50)->default('')->comment('关联id');
            $table->integer('uid')->default(0)->comment('用户id');
            $table->char('nickname',255)->default('')->comment('昵称');
            $table->char('phone',20)->default('')->comment('电话');
            $table->decimal('price',12,2)->default(0.00)->comment('交易金额');
            $table->tinyInteger('trading_type',1)->default(0)->comment('交易类型');
            $table->char('pay_type',32)->default('')->comment('支付类型');
            $table->char('mark',500)->default('')->comment('备注');
            $table->integer('add_time')->default(0)->comment('交易时间');
        });
        $this->setTableComment($this->table_name, '资金流水表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
