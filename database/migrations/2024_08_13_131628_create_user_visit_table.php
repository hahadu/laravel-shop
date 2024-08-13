<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'user_visit';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('自增ID');
            $table->integer('uid')->default(0)->comment('用户uid');
            $table->char('url',255)->default('')->comment('访问路径');
            $table->char('ip',255)->default('')->comment('用户ip');
            $table->integer('stay_time')->default(0)->comment('页面停留时间(秒)');
            $table->integer('add_time')->default(0)->comment('访问时间');
            $table->char('channel_type',255)->default('')->comment('用户访问端标识');
            $table->char('province',255)->default('')->comment('用户省份');
        });
        $this->setTableComment($this->table_name, '用户访问表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
