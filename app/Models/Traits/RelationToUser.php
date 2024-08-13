<?php

namespace App\Models\Traits;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait RelationToUser
{

    public function user():BelongsTo
    {
        return $this->relationToUser();
    }

    public function getUserNameAttribute()
    {

        return $this->user->name??null;
    }

    protected function relationToUser($foreignKey='user_id', $ownerKey=null):BelongsTo
    {
        return $this->belongsTo(User::class,$foreignKey,$ownerKey)->select(['id','name']);

    }


}
