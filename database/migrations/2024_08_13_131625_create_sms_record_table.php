<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'sms_record';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('短信发送记录编号');
            $table->char('uid',255)->default('')->comment('短信平台账号');
            $table->char('phone',11)->default('')->comment('接受短信的手机号');
            $table->text('content')->nullable()->comment('短信内容');
            $table->integer('add_time')->unsigned()->default(0)->comment('发送短信时间');
            $table->char('add_ip',16)->default('')->comment('添加记录ip');
            $table->char('template',255)->default('')->comment('短信模板ID');
            $table->integer('resultcode')->unsigned()->default(0)->comment('状态码 100=成功,130=失败,131=空号,132=停机,133=关机,134=无状态');
            $table->integer('record_id')->unsigned()->default(0)->comment('发送记录id');
        });
        $this->setTableComment($this->table_name, '短信发送记录表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
