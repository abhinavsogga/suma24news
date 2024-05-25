<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\UserVisit;

class TrackUserVisits
{
    public function handle($request, Closure $next)
    {
        // Store the current time and the URL for this request
        $request->session()->put('last_visited_time', Carbon::now());
        $request->session()->put('last_visited_url', $request->url());

        return $next($request);
    }

    public function terminate($request, $response)
    {
        // Retrieve the time and URL from the session
        $lastVisitedTime = $request->session()->pull('last_visited_time');
        $lastVisitedUrl = $request->session()->pull('last_visited_url');

        if ($lastVisitedTime && $lastVisitedUrl && Auth::check()) {
            $currentTime = Carbon::now();
            $timeSpent = $currentTime->diffInSeconds($lastVisitedTime);

            // Log the visit in the database
            UserVisit::create([
                'user_id' => Auth::id(),
                'url' => $lastVisitedUrl,
                'time_spent' => $timeSpent,
                'visited_at' => $lastVisitedTime,
            ]);
        }
    }
}