<?php

namespace App\Listeners;

use App\Events\LoginHistory;
use App\Models\UserLoginHistory;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class StoreUserLoginHistory
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
    public function handle(LoginHistory $event)
    {
        $userinfo = $event->user;

        $loginHistory = UserLoginHistory::create([
            'user_id' => $userinfo->id,
            'name' => $userinfo->name,
            'email' => $userinfo->email
        ]);

        return $loginHistory;
    }
}
