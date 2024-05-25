<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\PhotoGallery;
use Illuminate\Support\Facades\Storage;

class PhotoGalleryController extends Controller
{
    public function create()
    {
        return view('admin.photo-gallery.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $request->file('image')->store('photos', 'public');

        PhotoGallery::create([
            'title' => $request->title,
            'image_path' => $imagePath,
        ]);

        return redirect()->back()->with('success', 'Photo added successfully.');
    }

    public function index()
    {
        $photos = PhotoGallery::all();
        return view('admin.photo-gallery.index', compact('photos'));
    }

    public function edit($id)
    {
        $photoGallery = PhotoGallery::findOrFail($id);
        return view('admin.photo-gallery.edit', compact('photoGallery'));
    }

    public function update(Request $request, $id)
    {
        $photoGallery = PhotoGallery::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $data['title'] = $request->title;

        // Handle the image upload
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($photoGallery->image_path) {
                Storage::delete('photos/' . $photoGallery->image_path);
            }

            $imagePath = $request->file('image')->store('photos', 'public');
            $data['image_path'] = $imagePath;
        }

        $photoGallery->update($data);

        return redirect()->route('photo-gallery.index')
            ->with('success', 'Photo updated successfully.');
    }

    public function destroy($id)
    {
        $photo = PhotoGallery::findOrFail($id);

        // Delete the image file from storage
        Storage::disk('public')->delete($photo->image_path);

        // Delete the photo record from the database
        $photo->delete();

        return redirect()->back()->with('success', 'Photo deleted successfully.');
    }
}
