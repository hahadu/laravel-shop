<?php

namespace App\Models\Traits;

trait SetModelPublicDefaultAttribute
{
    public function setUserNameAttribute()
    {
        return request()->user()->name;
    }

    public function setUserIdAttribute()
    {
        return request()->user()->id;
    }

    public function setAppidAttribute()
    {
        return request()->user()->appid;
    }

    public function setCommercialIdAttribute()
    {
        return request()->user()->commercial_id;
    }



}
