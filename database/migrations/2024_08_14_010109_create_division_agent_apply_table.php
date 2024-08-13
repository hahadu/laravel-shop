<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'division_agent_apply';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('自增id');
            $table->integer('uid')->default(0)->comment('用户uid');
            $table->char('agent_name',255)->default('')->comment('代理商名称');
            $table->char('name',255)->default('')->comment('用户名称');
            $table->char('phone',32)->default(0)->comment('代理商电话');
            $table->integer('division_id')->default(0)->comment('事业部id');
            $table->integer('division_invite')->default(0)->comment('邀请码');
            $table->char('images',255)->default('')->comment('申请图片');
            $table->integer('add_time')->default(0)->comment('申请时间');
            $table->tinyInteger('status')->default(0)->comment('申请状态0申请，1同意，2拒绝');
            $table->char('refusal_reason',255)->default('')->comment('拒绝理由');
            $table->tinyInteger('is_del')->default(0)->comment('是否删除');
        });
        $this->setTableComment($this->table_name, '代理商申请表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
