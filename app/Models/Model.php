<?php

namespace App\Models;

use App\Models\Traits\DefaultDatetimeFormat;
use App\Models\Traits\ShowTableColumnsTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;
use Exception;
use function request;

class Model extends \Illuminate\Database\Eloquent\Model
{
    use HasFactory,ShowTableColumnsTrait;
    use DefaultDatetimeFormat;


    protected $hidden = ['deleted_at'];


    public function getTable(): string
    {
        return $this->table ?? Str::snake(class_basename($this));
    }

    protected function relationToUser($foreignKey='user_id', $ownerKey=null):BelongsTo
    {
        return $this->belongsTo(User::class,$foreignKey,$ownerKey)->select(['id','name']);

    }

//    public function setAppidAttribute()
//    {
//
//    }

//    public static function uquery(User $user=null): Builder
//    {
//
//        return parent::query()->where('appid',$user->appid);
//    }


}
