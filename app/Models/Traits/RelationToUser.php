<?php

namespace App\Models\Traits;

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


}
