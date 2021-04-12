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
        <div class="row">
            <div class="col-md-10">
                <h4>All Post</h4>

                @foreach ($posts as $post)
                    <div class="card my-4">
                        <div class="card-header">
                            {{ $post->title }}
                        </div>
                        <div class="card-body">
                            <div>{{ Str::limit($post->body, 200) }}</div>

                            <a href="/posts/{{ $post->slug }}">Read More</a>
                        </div>
                        <div class="card-footer">
                            Publised on {{ $post->created_at->format('d F, Y') }}, 
                            {{ $post->created_at->diffForHumans() }}
                        </div>
                    </div>
                @endforeach
                <div class="mt-4">

                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
