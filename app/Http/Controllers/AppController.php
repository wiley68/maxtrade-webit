<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Project;

class AppController extends Controller
{
    public function app(){
        return Inertia::render('App');
    }

    public function dashboard(){
        $projects = Project::all();
        return Inertia::render('Dashboard')->with([
            'projects' => $projects
        ]);
    }
}
