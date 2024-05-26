<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\LikeDislike;

class LikeDislikeNotification extends Notification
{
    use Queueable;
    public $likeDislike;

    /**
     * Create a new notification instance.
     */
    public function __construct(LikeDislike $likeDislike)
    {
        $this->likeDislike = $likeDislike;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toDatabase(object $notifiable): array
    {
        $likeDislike = $this->likeDislike->is_like?'liked':'disliked';
        return [
            'message' => $this->likeDislike->user->name. " {$likeDislike} the news <b>".$this->likeDislike->news->title."</b>",
            'link' => route('content.newsDetails', $this->likeDislike->news->slug),
        ];
    }
}
