<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use App\Models\UserVisit;
use App\Models\Category;
use App\Models\News;

use Illuminate\Support\Str;

class TrackUserVisits
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        // Update time spent for pending visit
        $this->updateTimeSpent();

        // Get category information based on the route
        $category = $this->getCategoryFromRoute($request);

        // Log the visit
        if(isset($category->id)) {
            $this->logVisit($request, $category->id);
        }

        return $response;
    }

    private function updateTimeSpent()
    {
        $visitId = session('visit_id');
        if ($visitId) {
            $pendingVisit = UserVisit::find($visitId);
            if ($pendingVisit) {
                $timeSpent = $pendingVisit->created_at->diffInSeconds(Carbon::now());
                $pendingVisit->update(['time_spent' => $timeSpent]);
            }
        }
    }

    private function getCategoryFromRoute($request)
    {
        $routeName = $request->route()->getName();
        switch ($routeName) {
            case 'content.listNews':
                $categorySlug = $request->route('category');
                return Category::where('slug', $categorySlug)->first();
            case 'content.newsDetails':
                $newsSlug = $request->route('slug');
                $news = News::where('slug', $newsSlug)->first();
                return $news ? $news->category : null;
            default:
                return null;
        }
    }

    private function logVisit($request, $categoryId)
    {
        $userId = Auth::id();
        $guestId = $request->cookie('guest_id') ?? Str::uuid();

        $visit = UserVisit::create([
            'user_id' => $userId,
            'guest_id' => $userId ? null : $guestId,
            'category_id' => $categoryId,
            'ip_address' => $request->ip(),
            'url' => $request->path(),
            'visit_time' => Carbon::now(),
        ]);

        session(['visit_id' => $visit->id]);

        // Set the guest ID cookie if it's a guest user
        if (!$userId) {
            cookie()->queue(cookie('guest_id', $guestId, 525600)); // 1 year
        }
    }

}