<?php

namespace App\Models;

use Illuminate\Support\Str;

class Model extends \Illuminate\Database\Eloquent\Model
{
    public function getTable(): string
    {
        return $this->table ?? Str::snake(class_basename($this));
    }

}
