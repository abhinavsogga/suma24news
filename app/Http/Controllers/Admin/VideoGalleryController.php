<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\VideoGallery;
use Illuminate\Support\Facades\Storage;

class VideoGalleryController extends Controller
{
    public function create()
    {
        return view('admin.video-gallery.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'cover_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'video_url' => 'required',
        ]);

        $imagePath = $request->file('cover_photo')->store('photos', 'public');

        VideoGallery::create([
            'title' => $request->title,
            'cover_photo' => $imagePath,
            'video_url' => $request->video_url
        ]);

        return redirect()->route('video-gallery.index')->with('success', 'Video added successfully.');
    }

    public function index()
    {
        $videos = VideoGallery::all();
        return view('admin.video-gallery.index', compact('videos'));
    }

    public function edit($id)
    {
        $videoGallery = VideoGallery::findOrFail($id);
        return view('admin.video-gallery.edit', compact('videoGallery'));
    }

    public function update(Request $request, $id)
    {
        $videoGallery = VideoGallery::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'cover_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'video_url' => 'required'
        ]);

        $data['title'] = $request->title;
        $data['video_url'] = $request->video_url;

        // Handle the image upload
        if ($request->hasFile('cover_photo')) {
            // Delete the old image if it exists
            if ($videoGallery->cover_photo) {
                Storage::delete('photos/' . $videoGallery->cover_photo);
            }

            $imagePath = $request->file('cover_photo')->store('photos', 'public');
            $data['cover_photo'] = $imagePath;
        }

        $videoGallery->update($data);

        return redirect()->route('video-gallery.index')
            ->with('success', 'Video updated successfully.');
    }

    public function destroy($id)
    {
        $video = VideoGallery::findOrFail($id);

        // Delete the image file from storage
        Storage::disk('public')->delete($video->cover_photo);

        // Delete the video record from the database
        $video->delete();

        return redirect()->route('video-gallery.index')->with('success', 'Video deleted successfully.');
    }
}