<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'store_coupon_issue_user';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->integer('uid')->default(0)->comment('领取优惠券用户ID');
            $table->integer('issue_coupon_id')->default(0)->comment('优惠券前台领取ID');
            $table->integer('add_time')->default(0)->comment('领取时间');
        });
        $this->setTableComment($this->table_name, '优惠券前台用户领取记录表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
