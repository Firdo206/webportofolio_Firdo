<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Models\Profile;
use App\Models\Project;
use App\Models\Skill;

class LandingController extends Controller
{
    public function index()
    {
        $profile = Profile::first();
        $skills = Skill::orderBy('order')->get()->groupBy('category');
        $experiences = Experience::orderByDesc('start_date')->get();
        $projects = Project::orderBy('order')->get();

        return view('landing', compact('profile', 'skills', 'experiences', 'projects'));
    }
}