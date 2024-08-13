<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'shipping_templates_free';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('编号');
            $table->integer('province_id')->default(0)->comment('省ID');
            $table->integer('temp_id')->default(0)->comment('模板ID');
            $table->integer('city_id')->default(0)->comment('城市ID');
            $table->decimal('number',12,2)->default(0.00)->comment('包邮件数');
            $table->decimal('price',12,2)->default(0.00)->comment('包邮金额');
            $table->tinyInteger('type',1)->default(1)->comment('计费方式');
            $table->char('uniqid',32)->default('')->comment('分组唯一值');
        });
        $this->setTableComment($this->table_name, '运费模板指定包邮关联表');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
