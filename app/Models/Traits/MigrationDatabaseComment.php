<?php

namespace App\Models\Traits;
use Illuminate\Support\Facades\DB;
trait MigrationDatabaseComment
{
    public function setTableComment(string $tableName,string $comment){
        DB::statement("ALTER TABLE `{$tableName}` comment '{$comment}'");
    }

}
