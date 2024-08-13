<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'qrcode';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('微信二维码ID');
            $table->char('third_type',32)->index()->default('')->comment('二维码类型');
            $table->integer('third_id')->unsigned()->default(0)->comment('用户id');
            $table->char('ticket',255)->index()->default('')->comment('二维码参数');
            $table->integer('expire_seconds')->unsigned()->default(0)->comment('二维码有效时间');
            $table->tinyInteger('status')->unsigned()->default(1)->comment('状态');
            $table->char('add_time',255)->default(0)->comment('添加时间');
            $table->char('url',255)->default('')->comment('微信访问url');
            $table->char('qrcode_url',255)->default('')->comment('微信二维码url');
            $table->integer('scan')->unsigned()->default(0)->comment('被扫的次数');
            $table->tinyInteger('type')->default(0)->comment('二维码所属平台1=小程序，2=公众号，3=H5');
        });
        $this->setTableComment($this->table_name, '微信二维码管理表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
