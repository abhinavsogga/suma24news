<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * Display the settings page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Retrieve the live streaming settings
        $liveStreamingSettings = json_decode(Setting::where('key', 'live_streaming_settings')->value('value'), true);

        return view('admin.settings', compact('liveStreamingSettings'));
    }

    /**
     * Update the specified settings.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        // Validate the input
        $request->validate([
            'settings.live_streaming.title' => 'required|string|max:255',
            'settings.live_streaming.poster' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'settings.live_streaming.url' => 'required|url',
        ]);

        // Handle the poster file upload
        if ($request->hasFile('settings.live_streaming.poster')) {
            $file = $request->file('settings.live_streaming.poster');
            $posterPath = $file->store('posters', 'public');  // Store in 'public/posters' directory
        } else {
            // Retrieve the existing JSON settings
            $existingSettings = Setting::where('key', 'live_streaming_settings')->value('value');
            $existingSettingsArray = json_decode($existingSettings, true);

            // Get the existing poster path if available
            $posterPath = $existingSettingsArray['poster'] ?? null;
        }

        // Prepare the settings data
        $settingsData = [
            'title' => $request->input('settings.live_streaming.title'),
            'poster' => $posterPath,
            'url' => $request->input('settings.live_streaming.url'),
        ];

        // Convert settings data to JSON
        $settingsJson = json_encode($settingsData);

        // Update or create the setting in the database
        Setting::updateOrCreate(['key' => 'live_streaming_settings'], ['value' => $settingsJson]);

        return redirect()->back()->with('success', 'Settings updated successfully.');
    }
}
