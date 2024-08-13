<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'user_address';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('用户地址id');
            $table->integer('uid')->index()->unsigned()->default(0)->comment('用户id');
            $table->char('real_name',32)->default('')->comment('收货人姓名');
            $table->char('phone',16)->default('')->comment('收货人电话');
            $table->char('province',64)->default('')->comment('收货人所在省');
            $table->char('city',64)->default('')->comment('收货人所在市');
            $table->integer('city_id')->default(0)->comment('城市id');
            $table->char('district',64)->default('')->comment('收货人所在区');
            $table->char('detail',255)->default('')->comment('收货人详细地址');
            $table->integer('post_code')->unsigned()->default(0)->comment('邮编');
            $table->char('longitude',16)->default(0)->comment('经度');
            $table->char('latitude',16)->default(0)->comment('纬度');
            $table->tinyInteger('is_default')->index()->unsigned()->default(0)->comment('是否默认');
            $table->tinyInteger('is_del')->index()->unsigned()->default(0)->comment('是否删除');
            $table->integer('add_time')->unsigned()->default(0)->comment('添加时间');
        });
        $this->setTableComment($this->table_name, '用户地址表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
