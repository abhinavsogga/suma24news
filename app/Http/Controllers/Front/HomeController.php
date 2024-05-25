<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use App\Models\PhotoGallery;
use App\Models\VideoGallery;

use App\Models\Setting;

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
    public function index()
    {
        return view('front.index', $this->getHomePageData());
    }

    private function getHomePageData(): array
    {
        $liveStreamingSettings = json_decode(Setting::where('key', 'live_streaming_settings')->value('value'), true);
        $photos = PhotoGallery::all();
        $videos = VideoGallery::latest()->take(4)->get();

        return [
            'breakingNews' => $this->news->getLatestBreakingNews(),
            'featuredNews' => $this->news->getFeaturedNews(),
            'latestNews' => $this->news->getLatestNews(6),
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