<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() 
    {
        $data = [
            'posts' => Post::OrderBy('created_at', 'desc')->limit(3)->get()
        ];
        dump('hello dump!');
        return view('home.index')->with($data);
    }
}
