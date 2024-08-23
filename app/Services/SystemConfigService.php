<?php

namespace App\Services;

use App\Models\SystemConfig;

class SystemConfigService
{


    /**
     * @param string $key
     * @return mixed
     */
    public function getConfigValue(string $key)
    {
        return SystemConfig::where('menu_name', $key)->value('value');
    }

}
