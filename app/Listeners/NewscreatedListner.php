<?php

namespace App\Listeners;

use App\Events\NewsCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\NewNewsNotification;
use App\Models\User;

class NewscreatedListner
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
    public function handle(NewsCreated $event): void
    {
        $users = User::role('admin')->get();
        foreach($users as $user){
            $user->notify(new NewNewsNotification());
        }
    }
}
