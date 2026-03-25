<?php

namespace App\Listeners;

//use App\Events\Logout;
//use Illuminate\Contracts\Queue\ShouldQueue;
//use Illuminate\Queue\InteractsWithQueue;
use App\Models\LoginLog;
use Illuminate\Auth\Events\Logout;

class LogSuccessfulLogout
{
    public function handle(Logout $event): void
    {
        if ($event->user) {
            LoginLog::where('user_id', $event->user->id)
                ->whereNull('logout_at')
                ->latest()
                ->first()
                ?->update(['logout_at' => now()]);
        }
    }
}
