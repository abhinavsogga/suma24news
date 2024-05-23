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
        $settings = Setting::all();
        return view('admin.settings', compact('settings'));
    }

    /**
     * Update the specified settings.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'key.*' => 'required|string',
            'value.*' => 'required',
        ]);

        foreach ($validatedData['key'] as $index => $key) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $validatedData['value'][$index]]
            );
        }

        return redirect()->route('settings.index')->with('success', 'Settings updated successfully.');
    }
}
