<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'store_bargain_user_help';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('砍价用户帮助表ID');
            $table->integer('uid')->unsigned()->default(0)->comment('帮助的用户id');
            $table->integer('bargain_id')->unsigned()->default(0)->comment('砍价商品ID');
            $table->integer('bargain_user_id')->unsigned()->default(0)->comment('用户参与砍价表id');
            $table->decimal('price',12,2)->unsigned()->default(0.00)->comment('帮助砍价多少金额');
            $table->integer('add_time')->unsigned()->default(0)->comment('添加时间');
            $table->tinyInteger('type',1)->default(0)->comment('是否自己砍价');
        });
        $this->setTableComment($this->table_name, '砍价用户帮助表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
