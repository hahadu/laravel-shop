<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'delivery_service';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('id');
            $table->integer('uid')->default(0)->comment('配送员uid');
            $table->char('avatar',250)->default('')->comment('配送员头像');
            $table->char('nickname',50)->default('')->comment('配送员名称');
            $table->char('phone',20)->default('')->comment('手机号码');
            $table->integer('add_time')->default(0)->comment('添加时间');
            $table->tinyInteger('status')->unsigned()->default(1)->comment('0隐藏1显示');
        });
        $this->setTableComment($this->table_name, '配送员表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
