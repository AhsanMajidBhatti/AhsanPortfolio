<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sidebar;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Project;
use App\Models\Award;
use App\Models\About;

class ResumeController extends Controller
{
    public function index()
    {
        $sidebars = Sidebar::all();
        $educations = Education::all();
        $experiences = Experience::all();
        $projects = Project::all();
        $awards = Award::all();
        $about = About::latest()->first();
        return view('resume-page.index', compact('sidebars', 'educations', 'experiences', 'projects', 'awards', 'about'));
    }

    public function Dashboard()
    {
        return view('admin-page.components.dashboard');
    }
}
