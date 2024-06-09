<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\News;

use App\Http\Requests\StoreNewsRequest;

use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the news.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $news = News::orderBy('created_at', 'desc')->get();
        return view('admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new news.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.news.create', compact('categories'));
    }

    /**
     * Store a newly created news in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreNewsRequest $request)
    {
        $validatedData = $request->validated();

        // Handle the image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('news_images', 'public');

            $validatedData['image'] = $imagePath;
        }

        // Add the logged-in user's ID to the validated data
        $validatedData['user_id'] = auth()->id();

        $news = News::create($validatedData);
        //event(new Newscreated());

        return redirect()->route('news.index')
            ->with('success', 'News created successfully.');
    }

    /**
     * Show the form for editing the specified news.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\View\View
     */

    public function edit($id)
    {
        $news = News::findOrFail($id);
        $categories = Category::all();

        return view('admin.news.edit', compact('news', 'categories'));
    }

    /**
     * Update the specified News in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(StoreNewsRequest $request, $id)
    {
        $news = News::findOrFail($id);

        $validatedData = $request->validated();

        // Handle the image upload
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($news->image) {
                Storage::delete('news_images/' . $news->image);
            }

            $imagePath = $request->file('image')->store('news_images', 'public');
            $validatedData['image'] = $imagePath;
        }

        // Ensure is_breaking and is_featured are set to 0 if not provided
        $validatedData['is_breaking'] = $request->has('is_breaking') ? $validatedData['is_breaking'] : 0;
        $validatedData['is_featured'] = $request->has('is_featured') ? $validatedData['is_featured'] : 0;

        // Update the news item
        $news->update($validatedData);

        return redirect()->route('news.index')
            ->with('success', 'News updated successfully.');
    }


    /**
     * Remove the specified news from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(News $news)
    {
        $news->delete();

        return redirect()->route('news.index')
            ->with('success', 'News deleted successfully.');
    }
}