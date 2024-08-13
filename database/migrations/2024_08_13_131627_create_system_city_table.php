<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'system_city';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('自增ID');
            $table->integer('city_id')->default(0)->comment('城市id');
            $table->integer('level')->default(0)->comment('省市级别');
            $table->integer('parent_id')->default(0)->comment('父级id');
            $table->char('area_code',30)->default('')->comment('区号');
            $table->char('name',100)->default('')->comment('名称');
            $table->char('merger_name',255)->default('')->comment('合并名称');
            $table->char('lng',50)->default('')->comment('经度');
            $table->char('lat',50)->default('')->comment('纬度');
            $table->tinyInteger('is_show',1)->default(1)->comment('是否展示');
        });
        $this->setTableComment($this->table_name, '城市表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
