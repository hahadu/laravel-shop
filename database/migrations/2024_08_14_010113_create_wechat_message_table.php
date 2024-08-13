<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'wechat_message';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('用户行为记录id');
            $table->char('openid',32)->index()->default('')->comment('用户openid');
            $table->char('type',32)->index()->default('')->comment('操作类型');
            $table->char('result',255)->default('')->comment('操作详细记录');
            $table->integer('add_time')->index()->unsigned()->default(0)->comment('操作时间');
        });
        $this->setTableComment($this->table_name, '用户行为记录表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
