<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() 
    {
        // dump('hello dump!');
        return view('home.index')->with([
            'posts' => Post::latest('created_at')->limit(3)->get()
        ]);
    }
}
