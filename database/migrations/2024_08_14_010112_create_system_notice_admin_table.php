<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'system_notice_admin';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('通知记录ID');
            $table->char('notice_type',64)->default('')->comment('通知类型');
            $table->smallInteger('admin_id')->index()->unsigned()->default(0)->comment('通知的管理员');
            $table->integer('link_id')->unsigned()->default(0)->comment('关联ID');
            $table->text('table_data')->nullable()->comment('通知的数据');
            $table->tinyInteger('is_click')->index()->unsigned()->default(0)->comment('点击次数');
            $table->tinyInteger('is_visit')->index()->unsigned()->default(0)->comment('访问次数');
            $table->integer('visit_time')->default(0)->comment('访问时间');
            $table->integer('add_time')->index()->unsigned()->default(0)->comment('通知时间');
        });
        $this->setTableComment($this->table_name, '通知记录表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
