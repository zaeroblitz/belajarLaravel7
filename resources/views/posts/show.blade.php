@extends('layouts.app')

@section('title', $post->title)

@section('head')
    <style>
        body {
            color: white;
            background-color: #424B54;
        }

    </style>
@endsection

@section('content')
    <div class="container">
        <h1>{{ $post->title }}</h1>
        <p>{{ $post->body }}</p>

        <a href="/posts">Back to Post Index</a>
    </div>
@endsection
