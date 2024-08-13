<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'shipping_templates';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('编号');
            $table->char('name',255)->default('')->comment('模板名称');
            $table->tinyInteger('type')->default(1)->comment('计费方式');
            $table->tinyInteger('appoint')->default(0)->comment('指定包邮');
            $table->tinyInteger('no_delivery')->default(0)->comment('指定不送达');
            $table->integer('sort')->default(0)->comment('排序');
            $table->integer('add_time')->default(0)->comment('添加时间');
        });
        $this->setTableComment($this->table_name, '运费模板表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
