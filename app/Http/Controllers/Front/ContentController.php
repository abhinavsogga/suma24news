<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

use App\Models\Category;
use App\Models\News;
use App\Models\Page;

class ContentController extends Controller
{
	public function listNews($category)
    {
        $category = Category::where('slug', $category)->firstOrFail();

        // Fetch the posts or other data related to the category
        $news = $category->news()->paginate(24);

        return view('front.category', [
            'category' => $category,
            'categorynews' => $news,
        ]);
    }

	public function showNewsDetails($slug)
	{
        $news = News::where('slug', $slug)->firstOrFail();

		return view('front.news', [
            'news' => $news,
        ]);
	}

	public function showPage($page) {
		$page = Page::where('slug', $page)->firstOrFail();

		return view('front.page', [
            'page' => $page,
        ]);
	}

    public function showAboutPage() {
		return view('front.about_suma');
	}
}