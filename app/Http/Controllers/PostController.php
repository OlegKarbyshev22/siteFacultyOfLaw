<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    public function show() : View
    {
        return view("layouts.news", [
            "posts_list" => Post::latest()->paginate(10)
        ]);
    }
}
