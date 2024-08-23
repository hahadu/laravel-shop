<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;

class SystemAdmin extends Model
{
    use HasFactory,SoftDeletes,HasApiTokens;

    protected $casts = [
        'status'=>'bool',
        'last_time'=>'datetime',
    ];

    protected $hidden = ['id','password','deleted_at','updated_at'];

}
