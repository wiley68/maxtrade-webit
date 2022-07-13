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
}
