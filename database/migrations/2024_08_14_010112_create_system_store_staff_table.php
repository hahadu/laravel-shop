<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'system_store_staff';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('自增ID');
            $table->integer('uid')->unsigned()->default(0)->comment('微信用户id');
            $table->char('avatar',255)->default('')->comment('店员头像');
            $table->integer('store_id')->default(0)->comment('门店id');
            $table->char('staff_name',64)->default('')->comment('店员名称');
            $table->char('phone',15)->default('')->comment('手机号码');
            $table->tinyInteger('verify_status')->default(0)->comment('核销开关');
            $table->tinyInteger('status')->default(1)->comment('状态');
            $table->integer('add_time')->default(0)->comment('添加时间');
        });
        $this->setTableComment($this->table_name, '门店店员表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
