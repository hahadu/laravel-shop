<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'wechat_reply';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('微信关键字回复id');
            $table->char('type',32)->index()->default('')->comment('回复类型');
            $table->text('data')->nullable()->comment('回复数据');
            $table->tinyInteger('status')->index()->unsigned()->default(1)->comment('0=不可用  1 =可用');
            $table->tinyInteger('hide')->index()->unsigned()->default(0)->comment('是否隐藏');
        });
        $this->setTableComment($this->table_name, '微信关键字回复表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
