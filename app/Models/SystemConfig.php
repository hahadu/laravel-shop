<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class SystemConfig extends Model
{
    use HasFactory;

    protected $casts = [
      'value' => 'json'
    ];
}
