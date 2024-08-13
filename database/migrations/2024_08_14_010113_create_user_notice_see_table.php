<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'user_notice_see';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('自增ID');
            $table->integer('nid')->default(0)->comment('查看的通知id');
            $table->integer('uid')->default(0)->comment('查看通知的用户id');
            $table->integer('add_time')->default(0)->comment('查看通知的时间');
        });
        $this->setTableComment($this->table_name, '用户通知发送记录表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
