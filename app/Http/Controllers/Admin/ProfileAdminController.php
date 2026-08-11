<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileAdminController extends Controller
{
    public function edit()
    {
        $profile = Profile::first();

        return view('admin.profile-portfolio.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $profile = Profile::first();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'tagline' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'photo' => 'nullable|image|max:2048',
            'cv_path' => 'nullable|file|mimes:pdf|max:5120',
            'github_url' => 'nullable|url|max:255',
            'instagram_url' => 'nullable|url|max:255',
            'whatsapp_number' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
        ]);

        if ($request->hasFile('photo')) {
            if ($profile->photo) {
                Storage::disk('public')->delete($profile->photo);
            }
            $validated['photo'] = $request->file('photo')->store('profile', 'public');
        }

        if ($request->hasFile('cv_path')) {
            if ($profile->cv_path) {
                Storage::disk('public')->delete($profile->cv_path);
            }
            $validated['cv_path'] = $request->file('cv_path')->store('cv', 'public');
        }

        $profile->update($validated);

        return redirect()
            ->route('dashboard.profile-portfolio.edit')
            ->with('success', 'Profil berhasil diperbarui.');
    }
}