<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(6);
        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create', ['post' => new Post()]);
    }

    public function store(PostRequest $postRequest)
    {
        // Validate the field
        $attr = $postRequest->all();

        // Session flash
        session()->flash('success', 'The post was created');

        // Assign title to the slug
        $attr['slug'] = \Str::slug(request('title'));

        Post::create($attr);

        return redirect('/posts');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(PostRequest $postRequest, Post $post)
    {
        // Validate the field
        $attr = $postRequest->all();

        // Session flash
        session()->flash('success', 'The post was updated');

        $post->update($attr);

        return redirect('/posts');
    }

    public function destroy(Post $post)
    {
        // Delete data
        $post->delete();

        // Session Flash
        session()->flash('success', 'The post was destroyed');

        return redirect('/posts');
    }
}
