<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;

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
            'liveStreamUrl' =>  $this->setting->get('live_streaming_url')
        ];
    }
}