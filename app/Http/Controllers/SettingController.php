<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Setting; // Assuming you have a Setting model

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    /**
     * Display the settings form.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('settings.index');
    }

    /**
     * Update the settings.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'site_name' => 'required|string|max:255',
            'email' => 'required|email',
            'contact_number' => 'nullable|string|max:15',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput();
        }

        // Save each setting key-value pair
        foreach ($request->except('_token') as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        return redirect()->back()->with('success', 'Settings updated successfully.');
    }



    public function updatePassword(Request $request)
    {
        // Validate the input
        $request->validate([
            'old_password' => ['required'],
            'new_password' => ['required', 'min:8', 'confirmed'],
        ]);

        // Check if the old password matches
        if (!Hash::check($request->old_password, Auth::user()->password)) {
            return back()->withErrors(['old_password' => 'The old password is incorrect.']);
        }

        // Update the user's password
        Auth::user()->update([
            'password' => Hash::make($request->new_password),
        ]);

        // Redirect back with success message
        return back()->with('status', 'Password successfully updated.');
    }
}
