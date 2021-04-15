<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;

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
        return view('posts.create', [
            'post' => new Post(),
            'categories' => Category::get(),
            'tags' => Tag::get(),
            ]);
    }

    public function store(PostRequest $postRequest)
    {
        // Validate the field
        $attr = $postRequest->all();

        // Assign title to the slug
        $attr['slug'] = \Str::slug(request('title'));
        
        // Assign category 
        $attr['category_id'] = request('category');

        // Create a new Post
        $post = Post::create($attr);

        // Fill selected tag
        $post->tags()->attach(request('tags'));

        // Session flash
        session()->flash('success', 'The post was created');

        return redirect('/posts');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', [
            'post' => $post,
            'categories' => Category::get(),
            'tags' => Tag::get(),
        ]);
    }

    public function update(PostRequest $postRequest, Post $post)
    {
        // Validate the field
        $attr = $postRequest->all();

        // Assign the category
        $attr['category_id'] = request('category');
        
        // Update Post
        $post->update($attr);

        // Sync selected/removed tags 
        $post->tags()->sync(request('tags'));

         // Session flash
         session()->flash('success', 'The post was updated');

        return redirect('/posts');
    }

    public function destroy(Post $post)
    {
        // Delete tags
        $post->tags()->detach();
        
        // Delete data
        $post->delete();

        // Session Flash
        session()->flash('success', 'The post was destroyed');

        return redirect('/posts');
    }
}
