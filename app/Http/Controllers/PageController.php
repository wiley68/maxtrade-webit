<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        return view('welcome')->with([
            'title' => 'Welcome',
            'description' => 'Simple web wysiwyg editor',
            'keywords' => 'web, wysiwyg, editor, html5'
        ]);
    }

    public function documentation(){
        return view('documentation')->with([
            'title' => 'Documentation',
            'description' => 'Simple web wysiwyg editor, documentation',
            'keywords' => 'help, web, wysiwyg, editor, html5'
        ]);
    }

    public function projects(){
        return view('projects')->with([
            'title' => 'Public projects',
            'description' => 'Simple web wysiwyg editor, Public projects',
            'keywords' => 'projects, public, web, wysiwyg, editor, html5'
        ]);
    }

    public function news(){
        return view('news')->with([
            'title' => 'News',
            'description' => 'Simple web wysiwyg editor, News and information about Maxtrade Webit',
            'keywords' => 'newse, info, public, web, wysiwyg, editor, html5'
        ]);
    }
}
