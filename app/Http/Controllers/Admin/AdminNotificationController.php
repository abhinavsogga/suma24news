<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AdminNotificationController extends Controller
{
    /**
     * Delete a specific notification.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Notifications\DatabaseNotification  $notification
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, DatabaseNotification $notification)
    {
        // Check if the notification belongs to the authenticated user
        if ($notification->notifiable_id !== Auth::id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $notification->delete();

        return redirect()->back()
            ->with('success', 'Notification deleted successfully');
    }

    /**
     * Mark a specific notification as read.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Notifications\DatabaseNotification  $notification
     * @return \Illuminate\Http\Response
     */
    public function markAsRead(Request $request, DatabaseNotification $notification)
    {
        // Check if the notification belongs to the authenticated user
        if ($notification->notifiable_id !== Auth::id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $notification->markAsRead();

        return redirect()->back()
            ->with('success', 'Notification marked as read');
    }
}
