<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'system_admin';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('后台管理员表ID');
            $table->char('username',32)->index()->default('')->comment('后台管理员账号');
            $table->char('head_pic',255)->default('')->comment('管理员头像');
            $table->char('password',100)->default('')->comment('后台管理员密码');
            $table->char('real_name',16)->default('')->comment('后台管理员姓名');
            $table->char('roles',128)->default('')->comment('后台管理员权限(menus_id)');
            $table->char('last_ip',16)->default('')->comment('后台管理员最后一次登录ip');
            $table->integer('last_time')->unsigned()->default(0)->comment('后台管理员最后一次登录时间');
        //    $table->dateTime('add_time')->unsigned()->default(0)->comment('后台管理员添加时间');
            $table->integer('login_count')->unsigned()->default(0)->comment('登录次数');
            $table->tinyInteger('level')->unsigned()->default(1)->comment('后台管理员级别');
            $table->tinyInteger('status')->index()->unsigned()->default(1)->comment('后台管理员状态 1有效0无效');
            $table->integer('division_id')->default(0)->comment('事业部id');

            //$table->tinyInteger('is_del')->unsigned()->default(0)->comment('是否删除, ');
            $table->dateTime('created_at')->comment('创建时间');
            $table->dateTime('updated_at')->comment('修改时间')->nullable();
            $table->softDeletes()->comment('删除时间');
        });
        $this->setTableComment($this->table_name, '后台管理员表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
