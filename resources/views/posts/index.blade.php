@extends('layouts.app')

@section('title')
    Post index
@endsection

@section('head')
    <style>
        body {
            color: white;
            background-color: #424B54;
        }

        .card {
            color: black;
            border-radius: 12px;
        }

        .card-header {
            font-weight: bold;
        }

        .card-footer {
            font-weight: 300;
            color: lightslategray;
        }

    </style>
@endsection

@section('content')
    <div class="container">

        <div class="d-flex justify-content-between">
            <div>
                <h4>All Post</h4>
            </div>
            <div>
                <a href="/posts/create" class="btn btn-primary">New Post</a>
            </div>
        </div>
        <div class="row">

            @forelse ($posts as $post)
                <div class="col-md-4">
                    <div class="card my-4">
                        <div class="card-header">
                            {{ $post->title }}
                        </div>
                        <div class="card-body">
                            @if (strlen($post->body) < 200)
                                <div>{{ $post->body, 200 }}</div>
                            @else
                                <div>{{ Str::limit($post->body, 200) }}</div>

                                <a href="/posts/show/{{ $post->slug }}">Read More</a>
                            @endif
                        </div>
                        <div class="card-footer d-flex justify-content-between align-items-center">
                            <div>
                                <div class="created-at">
                                    Publised on {{ $post->created_at->format('d F, Y') }}
                                </div>
                                <div class="updated-at">
                                    Edited on {{ $post->updated_at->diffForHumans() }}
                                </div>
                            </div>
                            <a href="/posts/{{ $post->slug }}/edit" class="btn btn-sm btn-success">Edit</a>
                        </div>
                    </div>
                </div>

            @empty
                <div class="col-md-6">
                    <div class="alert alert-info">There's no posts</div>
                </div>
            @endforelse
        </div>

        <div class="mt-4 d-flex justify-content-center">
            <div>
                {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection
