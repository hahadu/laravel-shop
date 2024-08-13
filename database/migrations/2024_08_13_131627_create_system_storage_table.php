<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'system_storage';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('自增ID');
            $table->char('access_key',100)->index()->default('')->comment('access_key');
            $table->tinyInteger('type',1)->default(1)->comment('1=本地存储,2=七牛,3=oss,4=cos');
            $table->char('name',100)->default('')->comment('空间名');
            $table->char('region',100)->default('')->comment('地域');
            $table->enum('acl','private','public-read','public-read-write')->default('public-read')->comment('权限');
            $table->char('domain',100)->default('')->comment('空间域名');
            $table->char('cdn',255)->default('')->comment('CDN加速域名');
            $table->char('cname',255)->default('')->comment('CNAME值');
            $table->tinyInteger('is_ssl',1)->default(0)->comment('0=http,1=https');
            $table->tinyInteger('status',1)->index()->default(0)->comment('状态');
            $table->tinyInteger('is_delete',1)->index()->default(0)->comment('是否删除');
            $table->integer('add_time')->comment('添加事件');
            $table->integer('update_time')->comment('更新事件');
        });
        $this->setTableComment($this->table_name, '云储存');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
