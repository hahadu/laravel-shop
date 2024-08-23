<?php

namespace App\Listeners;

use App\Events\AdminUserLoginEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;


class AdminUserLoginListener implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(AdminUserLoginEvent $event): void
    {
        Log::debug('有用户登录了:'.$event->admin->username);

    }

}
