<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function show(Post $post)
    {
        // $post = Post::where('slug', $slug)->firstOrFail();
        // dd($posts);
        return view('posts.show', compact('post'));
    }
}
