<?php

namespace App\Listeners;

use App\Events\NewRegistration;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\RegisterNotification;
use App\Models\User;

class NewRegistrationListner
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
    public function handle(NewRegistration $event): void
    {
        $users = User::role('admin')->get();
        $newUser = $event->user;
        foreach($users as $user){
            $user->notify(new RegisterNotification($newUser));
        }
    }
}
