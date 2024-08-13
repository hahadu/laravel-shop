<?php

namespace App\Models\Traits;

use Illuminate\Support\Facades\DB;

trait ShowTableColumnsTrait
{
    public function showTableColumns()
    {

        return DB::select('show COLUMNS FROM `' . $this->getTable() .'`');
    }

    public function getColumnNames()
    {
        $columList = $this->showTableColumns();
        $list = [];
        foreach ($columList as $colum)
        {
            $list[] = $colum->Field;
        }
        return $list;
    }

}
