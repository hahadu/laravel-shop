<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'system_store';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('自增ID');
            $table->char('name',100)->default('')->comment('门店名称');
            $table->char('introduction',255)->default('')->comment('简介');
            $table->char('phone',25)->index()->default('')->comment('手机号码');
            $table->char('address',255)->default('')->comment('省市区');
            $table->char('detailed_address',255)->default('')->comment('详细地址');
            $table->char('image',255)->default('')->comment('门店logo');
            $table->char('oblong_image',255)->default('')->comment('门店推荐图');
            $table->char('latitude',25)->default('')->comment('纬度');
            $table->char('longitude',25)->default('')->comment('经度');
            $table->char('valid_time',100)->default('')->comment('核销有效日期');
            $table->char('day_time',100)->default('')->comment('每日营业开关时间');
            $table->integer('add_time')->default(0)->comment('添加时间');
            $table->tinyInteger('is_show')->default(0)->comment('是否显示');
            $table->tinyInteger('is_del')->default(0)->comment('是否删除');
        });
        $this->setTableComment($this->table_name, '门店自提');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
