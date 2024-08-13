<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'store_order_status';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->integer('oid')->index()->unsigned()->default(0)->comment('订单id');
            $table->char('change_type',32)->index()->default('')->comment('操作类型');
            $table->char('change_message',255)->default('')->comment('操作备注');
            $table->integer('change_time')->unsigned()->default(0)->comment('操作时间');
        });
        $this->setTableComment($this->table_name, '订单操作记录表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
