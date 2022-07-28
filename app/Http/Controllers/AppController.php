<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Project;
use Auth;

class AppController extends Controller
{
    public function app()
    {
        return Inertia::render('App')->with([
            'new_project' => []
        ]);
    }

    public function dashboard()
    {
        $user_id = Auth::user()->id;
        $projects = Project::where('user_id', '=', $user_id)->get();
        $projects_others = Project::where('user_id', '<>', $user_id)->get();
        return Inertia::render('Dashboard')->with([
            'projects' => $projects,
            'projects_others' => $projects_others
        ]);
    }

    public function newProject()
    {
        $user_id = Auth::user()->id;
        $project = new Project();
        $project_count = Project::where('user_id', '=', $user_id)->count();
        $project->name = 'Untitled_' . $project_count;
        $project->project = '';
        $project->type = true;
        $project->user_id = $user_id;
        $project->save();
    }
}
