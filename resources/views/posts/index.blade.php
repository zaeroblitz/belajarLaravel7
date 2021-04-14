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

                            <div class="text-secondary">
                                <small>
                                    {{ $post->category->title }} &middot; {{ $post->created_at->format('d M, Y') }}
                                </small>
                            </div>
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
                                <div class="updated-at text-secondary">
                                    <small>
                                        Edited on {{ $post->updated_at->diffForHumans() }}
                                    </small>
                                </div>
                            </div>
                            <div>
                                <a href="/posts/{{ $post->slug }}/edit" class="btn btn-sm btn-success mb-2">Edit</a>

                                <div>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#exampleModal">
                                        Del
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                        aria-hidden="true">
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

                                                            <button type="button" class="btn btn-success btn-sm"
                                                                data-dismiss="modal">Batal</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
