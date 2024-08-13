<?php

namespace App\Models;

use App\Models\Traits\DefaultDatetimeFormat;
use App\Models\Traits\ShowTableColumnsTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Model extends \Illuminate\Database\Eloquent\Model
{
    use HasFactory,ShowTableColumnsTrait;
    use DefaultDatetimeFormat;


    protected $hidden = ['deleted_at'];


    public function getTable(): string
    {
        return $this->table ?? Str::snake(class_basename($this));
    }



}
