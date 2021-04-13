<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // $posts = Post::orderBy('id')->paginate();
        $posts = Post::latest()->paginate(6);
        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        // Validate the field
        $attr = request()->validate([
            'title' => 'required|min:3',
            'body' => 'required',
        ]);

        // Session flash
        session()->flash('success', 'The post was created');
        // session()->flash('error', 'The post was not created');

        // Assign title to the slug
        $attr['slug'] = \Str::slug(request('title'));

        Post::create($attr);

        return redirect('/posts');
        // return back();
    }
}
