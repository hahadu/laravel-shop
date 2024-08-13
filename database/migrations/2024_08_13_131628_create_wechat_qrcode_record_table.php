<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'wechat_qrcode_record';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('自增ID');
            $table->integer('qid')->default(0)->comment('渠道码id');
            $table->integer('uid')->default(0)->comment('用户id');
            $table->tinyInteger('is_follow',1)->default(0)->comment('是否关注');
            $table->integer('add_time')->default(0)->comment('扫码时间');
        });
        $this->setTableComment($this->table_name, '渠道码扫码记录表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
