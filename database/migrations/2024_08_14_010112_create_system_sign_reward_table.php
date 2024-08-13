<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'system_sign_reward';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('编号');
            $table->tinyInteger('type')->default(0)->comment('类型，0连续签到奖励，1累计签到奖励');
            $table->integer('days')->default(0)->comment('天数');
            $table->integer('point')->default(0)->comment('赠送积分');
            $table->integer('exp')->default(0)->comment('赠送经验');
        });
        $this->setTableComment($this->table_name, '系统签到奖励表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
