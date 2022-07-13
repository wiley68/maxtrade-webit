<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        return view('welcome')->with([
            'title' => env('APP_NAME', 'Maxtrade Webit'),
            'description' => 'Simple web wysiwyg editor',
            'keywords' => 'web, wysiwyg, editor, html5'
        ]);
    }
}
