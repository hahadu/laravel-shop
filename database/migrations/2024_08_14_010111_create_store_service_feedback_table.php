<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'store_service_feedback';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('自增ID');
            $table->integer('uid')->index()->default(0)->comment('用户UID');
            $table->char('rela_name',255)->default('')->comment('姓名');
            $table->char('phone',30)->default('')->comment('电话');
            $table->char('content',255)->default('')->comment('反馈内容');
            $table->char('make',255)->default('')->comment('备注');
            $table->tinyInteger('status')->default(0)->comment('状态0=未查看，1=已查看');
            $table->integer('add_time')->default(0)->comment('添加时间');
        });
        $this->setTableComment($this->table_name, '反馈');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
