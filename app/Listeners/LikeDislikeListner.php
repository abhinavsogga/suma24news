<?php

namespace App\Listeners;

use App\Events\LikeDislikeEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\LikeDislikeNotification;
use App\Models\User;

class LikeDislikeListner
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
    public function handle(LikeDislikeEvent $event): void
    {
        $users = User::role('admin')->get();
        $likeDislike = $event->likeDislike;
        foreach($users as $user){
            $user->notify(new LikeDislikeNotification($likeDislike));
        }
    }
}
