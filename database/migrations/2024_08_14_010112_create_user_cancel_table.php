<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'user_cancel';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('主键id');
            $table->integer('uid')->default(0)->comment('用户uid');
            $table->char('name',255)->default('')->comment('用户昵称');
            $table->char('phone',20)->default('')->comment('手机号');
            $table->integer('add_time')->default(0)->comment('用户提交申请时间');
            $table->tinyInteger('status')->default(0)->comment('1通过，2拒绝');
            $table->integer('up_time')->default(0)->comment('操作时间');
            $table->char('remark',255)->default('')->comment('备注');
        });
        $this->setTableComment($this->table_name, '用户注销表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
