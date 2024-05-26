<?php

namespace App\Http\Controllers\Front;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\PhotoGallery;
use App\Models\VideoGallery;

use App\Models\Setting;
use App\Models\User;

use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function __construct(Setting $setting, News $news)
    {
        $this->setting = $setting;
        $this->news = $news;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        return view('front.index', $this->getHomePageData($request));
    }

    private function getHomePageData($request): array
    {
        $liveStreamingSettings = json_decode(Setting::where('key', 'live_streaming_settings')->value('value'), true);
        $photos = PhotoGallery::all();
        $videos = VideoGallery::latest()->take(4)->get();

        $userId = Auth::id();
        $guestId = $request->cookie('guest_id') ?? Str::uuid();

        $mostVisitedCategory = (int) User::getMostVisitedCategory($userId, $guestId);

        return [
            'breakingNews' => $this->news->getLatestBreakingNews($mostVisitedCategory),
            'featuredNews' => $this->news->getFeaturedNews($mostVisitedCategory),
            'latestNews' => $this->news->getLatestNews($mostVisitedCategory, 6),
            'educationNews' => $this->news->getLatestByCategory('education', 10),
            'entertainmentNews' => $this->news->getLatestByCategory('entertainment', 10),
            'cultureNews' => $this->news->getLatestByCategory('culture'),
            'internationalNews' => $this->news->getLatestByCategory('international'),
            'futureNews' => $this->news->getLatestByCategory('politics'),
            'politicsNews' => $this->news->getLatestByCategory('politics', 9),
            'liveStreamingSettings' =>  $liveStreamingSettings,
            'photos' => $photos,
            'videos' => $videos
        ];
    }
}