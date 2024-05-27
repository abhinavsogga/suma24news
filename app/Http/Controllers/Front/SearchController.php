<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Models\News; // Assuming you have a Post model

use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('q');

        $newsItems = News::where('title', 'like', "%$query%")
                      ->orWhere('description', 'like', "%$query%")
                      ->get();

        return view('front.search-results', compact('newsItems', 'query'));
    }
}