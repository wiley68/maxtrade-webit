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
        return Inertia::render('App');
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
        $project->name = '';
        $project->project = '';
        $project->type = true;
        $project->user_id = $user_id;
        $project->save();
        $project_name = 'Untitled_' . $project->id;
        $project->name = $project_name;
        $project->project = '{"root":{"key":"project","value":"'.$project_name.'","description":"","parent":null,"type":"project","innerText":"","innerHTML":"","attributes":[],"children":[]}}';
        $project->save();

        return back();
    }

    public function deleteProject(Request $request)
    {
        $project = Project::find($request->id);
        $project->delete();
        return back();
    }
}
