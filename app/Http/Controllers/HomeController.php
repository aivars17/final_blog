<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('date', 'desc')->paginate(5);
        return view('home',compact('posts'));
    }
}
