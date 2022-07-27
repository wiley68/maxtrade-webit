<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class AppController extends Controller
{
    public function app(){
        return Inertia::render('App');
    }

    public function dashboard(){
        return Inertia::render('Dashboard');
    }
}
