<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show($slugURL)
    {
        return view('posts.show', compact('slugURL'));
    }
}
