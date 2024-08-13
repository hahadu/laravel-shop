<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'express';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('快递公司id');
            $table->char('code',50)->index()->default('')->comment('快递公司简称');
            $table->char('name',50)->default('')->comment('快递公司全称');
            $table->tinyInteger('partner_id')->default(0)->comment('是否需要月结账号');
            $table->tinyInteger('partner_key')->default(0)->comment('是否需要月结密码');
            $table->tinyInteger('net')->default(0)->comment('是否需要取件网店');
            $table->tinyInteger('check_man')->default(0)->comment('是否填写电子面单承载快递员名');
            $table->tinyInteger('partner_name')->default(0)->comment('是否填写电子面单客户账户名称');
            $table->tinyInteger('is_code')->default(0)->comment('是否填写电子面单承载编号');
            $table->char('courier_name',100)->default('')->comment('承载快递员名');
            $table->char('customer_name',100)->default('')->comment('客户账户名称');
            $table->char('code_name',100)->default('')->comment('电子面单承载编号');
            $table->char('account',100)->default('')->comment('账号');
            $table->char('key',100)->default('')->comment('密码');
            $table->char('net_name',100)->default('')->comment('网点名称');
            $table->integer('sort')->default(0)->comment('排序');
            $table->tinyInteger('is_show')->index()->default(0)->comment('是否显示');
            $table->tinyInteger('status')->default(0)->comment('是否可用');
        });
        $this->setTableComment($this->table_name, '快递公司表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
