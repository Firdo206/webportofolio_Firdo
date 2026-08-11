<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function index()
    {
        $experiences = Experience::orderByDesc('start_date')->get();
        return view('admin.experiences.index', compact('experiences'));
    }

    public function create()
    {
        return view('admin.experiences.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'place' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'type' => 'required|in:magang,organisasi,lomba',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        Experience::create($validated);

        return redirect()->route('dashboard.experiences.index')->with('success', 'Experience berhasil ditambahkan.');
    }

    public function edit(Experience $experience)
    {
        return view('admin.experiences.edit', compact('experience'));
    }

    public function update(Request $request, Experience $experience)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'place' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'type' => 'required|in:magang,organisasi,lomba',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        $experience->update($validated);

        return redirect()->route('dashboard.experiences.index')->with('success', 'Experience berhasil diupdate.');
    }

    public function destroy(Experience $experience)
    {
        $experience->delete();
        return redirect()->route('dashboard.experiences.index')->with('success', 'Experience berhasil dihapus.');
    }
}