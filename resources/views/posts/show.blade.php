@extends('layouts.app')

@section('title', $post->title)

@section('head')
    <style>
        body {
            color: white;
            background-color: #424B54;
        }

        button a {
            color: white;
            text-decoration: unset;
        }

        button a:hover {
            color: white;
            text-decoration: unset;
        }

    </style>
@endsection

@section('content')
    <div class="container">
        <h1>{{ $post->title }}</h1>
        <div class="text-white mt-2">
            <small>
                <a href="/categories/{{ $post->category->slug }}">{{ $post->category->title }}</a>
                &middot; {{ $post->created_at->format('d F, Y') }}
                &middot;
                @foreach ($post->tags as $tag)
                    <a href="/tags/{{ $tag->slug }}">{{ $tag->name }}</a>
                @endforeach
            </small>
            <hr>
        </div>
        <p>{{ $post->body }}</p>

        <div>
            <a href="/posts/{{ $post->slug }}/edit" class="btn btn-success mb-2">Edit</a>
        </div>

        <div>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                Delete
            </button>

            <div></div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Anda yakin untuk
                                mengahapusnya?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div>
                                <div>{{ $post->title }}</div>
                                <div class="text-secondary">
                                    <small>
                                        Publised on {{ $post->created_at->format('d F, Y') }}
                                    </small>
                                </div>
                            </div>
                            <div class="mt-2">
                                <form action="/posts/{{ $post->slug }}/delete" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-sm btn-danger mr-2">Hapus</button>

                                    <button type="button" class="btn btn-success btn-sm" data-dismiss="modal">Batal</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <button class="btn btn-primary mt-2">
            <a href="/posts">Back to Post Index</a>
        </button>
    @endsection
