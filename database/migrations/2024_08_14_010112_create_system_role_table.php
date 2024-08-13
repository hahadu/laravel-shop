<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'system_role';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('身份管理id');
            $table->char('role_name',32)->default('')->comment('身份管理名称');
            $table->text('rules')->nullable()->comment('身份管理权限(menus_id)');
            $table->tinyInteger('level')->unsigned()->default(0)->comment('管理员等级');
            $table->tinyInteger('status')->index()->unsigned()->default(1)->comment('状态');
        });
        $this->setTableComment($this->table_name, '身份管理表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
