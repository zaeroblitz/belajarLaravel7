@extends('layouts.app', ['title' => 'New Post'])

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
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">New Post</div>
                    <div class="card-body">
                        <form action="/posts/store" method="post">
                            @csrf
                            @include('posts.partials.form-control', ['submit' => 'Create'])
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
