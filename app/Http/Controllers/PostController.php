<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function show($slug)
    {
        $post = DB::table('posts')->where('slug', $slug)->first();
        // dd($posts);
        return view('posts.show', compact('slug', 'post'));
    }
}
