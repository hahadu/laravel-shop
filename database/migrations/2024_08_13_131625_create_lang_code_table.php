<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'lang_code';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('自增ID');
            $table->integer('type_id')->default(0)->comment('语言类型');
            $table->char('code',255)->default('')->comment('状态码');
            $table->char('remarks',255)->default('')->comment('备注说明');
            $table->char('lang_explain',255)->default('')->comment('说明');
            $table->tinyInteger('is_admin',1)->default(0)->comment('服务端1，用户端2');
        });
        $this->setTableComment($this->table_name, '语言code表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
