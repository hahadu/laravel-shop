<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Models\Traits\MigrationDatabaseComment;

    private string $table_name = 'job_batches';

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create($this->table_name, function (Blueprint $table) {
            $table->id()->comment('');
            $table->char('name',255)->comment('');
            $table->integer('total_jobs')->comment('');
            $table->integer('pending_jobs')->comment('');
            $table->integer('failed_jobs')->comment('');
            $table->longText('failed_job_ids')->comment('');
            $table->mediumText('options')->nullable()->comment('');
            $table->integer('cancelled_at')->nullable()->comment('');
            $table->integer('created_at')->comment('');
            $table->integer('finished_at')->nullable()->comment('');
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
