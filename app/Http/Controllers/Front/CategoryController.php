<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

use App\Models\Category;

class CategoryController extends Controller
{
	public function index($category)
    {
        $category = Category::where('slug', $category)->firstOrFail();
die('tt');
        // Fetch the posts or other data related to the category
        $news = $category->news()->paginate(24);

        return view('front.category', [
            'category' => $category,
            'categorynews' => $news,
        ]);
    }
}