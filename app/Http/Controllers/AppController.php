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
        $projects = Project::where('user_id', '=', $user_id)->orderBy('id', 'DESC')->get();
        $projects_others = Project::where('user_id', '<>', $user_id)->orderBy('id', 'DESC')->get();
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

    public function cloneProject(Request $request)
    {
        $user_id = Auth::user()->id;
        $project = Project::find($request->id);
        $project_new = new Project();
        $project_new->name = '';
        $project_new->project = $project->project;
        $project_new->type = $project->type;
        $project_new->user_id = $user_id;
        $project_new->save();
        $project_name = 'Untitled_' . $project_new->id;
        $project_new->name = $project_name;
        $project_new->project = str_replace($project->name, $project_name, $project_new->project);
        $project_new->save();

        return back();
    }

    public function deleteProject(Request $request)
    {
        $project = Project::find($request->id);
        $project->delete();
        return back();
    }

    public function saveProject(Request $request)
    {
        $project = Project::find($request->id);
        $project->name = $request->name;
        $project->user_id = $request->user_id;
        $project->created_at = $request->created_at;
        $project->updated_at = $request->updated_at;
        $project->type = $request->type;
        $project->project = $request->project;
        $project->save();

        return back();
    }
}
