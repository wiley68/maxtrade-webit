<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Project;
use Auth;

class AppController extends Controller
{
    public function app(){
        return Inertia::render('App');
    }

    public function dashboard(){
        $user_id = Auth::user()->id;
        $projects = Project::where('user_id', '=', $user_id)->get();
        $projects_others = Project::where('user_id', '<>', $user_id)->get();
        return Inertia::render('Dashboard')->with([
            'projects' => $projects,
            'projects_others' => $projects_others
        ]);
    }
}
