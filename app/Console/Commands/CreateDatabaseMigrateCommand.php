<?php

namespace App\Console\Commands;

use Hahadu\DatabaseToMigration\OutputMigrations;
use Hahadu\DatabaseToMigration\OutputModel;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
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
            usleep(100);
            $table_name = reset($table);
            echo app(OutputMigrations::class)->createTableBody(reset($table));
            echo " 成功".PHP_EOL;
            usleep(5000);
            Str::replace("eb_", "", $table_name);
            echo app(OutputModel::class)->outputModel($table_name);
            echo " 成功".PHP_EOL;
            usleep(1000);

        }


    //    app(OutputMigrations::class)->createTableBody($tables_name);


    }


}
