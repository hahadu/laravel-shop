<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'cache';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->char('key',32)->default('')->comment('缓存key');
            $table->text('result')->nullable()->comment('缓存数据');
            $table->integer('expire_time')->default(0)->comment('失效时间0=永久');
            $table->integer('add_time')->default(0)->comment('缓存时间');
        });
        $this->setTableComment($this->table_name, '微信缓存表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
