<?php

namespace App\Console\Commands;

use App\Models\User;
use Hahadu\DatabaseToMigration\OutputMigrations;
use Hahadu\DatabaseToMigration\OutputModel;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class CreateDatabaseMigrateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cdm';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
       //$tables_name = 'eb_user';
       $table_list = DB::select('SHOW TABLES');
       // dump(Str::studly($tables_name));



//        dump($table_list);
        foreach ($table_list as $table) {

            $table_name = reset($table);
            echo app(OutputMigrations::class)->createTableBody(reset($table));
            echo " 成功".PHP_EOL;
            Str::replace("eb_", "", $table_name);
            echo app(OutputModel::class)->outputModel($table_name);
            echo " 成功".PHP_EOL;

        }


    //    app(OutputMigrations::class)->createTableBody($tables_name);


    }


}
