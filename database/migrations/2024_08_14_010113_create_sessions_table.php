<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'sessions';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('');
            $table->bigInteger('user_id')->unsigned()->nullable()->comment('');
            $table->char('ip_address',45)->nullable()->comment('');
            $table->text('user_agent')->nullable()->comment('');
            $table->longText('payload')->comment('');
            $table->integer('last_activity')->comment('');
        });
        $this->setTableComment($this->table_name, '');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->table_name);
    }
};
