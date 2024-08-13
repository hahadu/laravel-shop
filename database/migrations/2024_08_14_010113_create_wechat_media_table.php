<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'wechat_media';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('微信视频音频id');
            $table->char('type',16)->index()->default('')->comment('回复类型');
            $table->char('path',128)->default('')->comment('文件路径');
            $table->char('media_id',64)->default('')->comment('微信服务器返回的id');
            $table->char('url',255)->default('')->comment('地址');
            $table->tinyInteger('temporary')->unsigned()->default(0)->comment('是否永久或者临时 0永久1临时');
            $table->integer('add_time')->unsigned()->default(0)->comment('添加时间');
        });
        $this->setTableComment($this->table_name, '微信回复表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
