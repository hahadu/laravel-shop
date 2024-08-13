<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'wechat_key';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('自增ID');
            $table->mediumInteger('reply_id')->default(0)->comment('回复内容id');
            $table->char('keys',64)->default('')->comment('关键词');
            $table->tinyInteger('key_type')->default(0)->comment('回复类型，0公众号自动回复，1客服自动回复');
        });
        $this->setTableComment($this->table_name, '微信回复关键词辅助表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
