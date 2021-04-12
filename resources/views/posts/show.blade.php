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
            text-decoration:unset;
        }

        button a:hover {
            color:white;
            text-decoration:unset;
        }

    </style>
@endsection

@section('content')
    <div class="container">
        <h1>{{ $post->title }}</h1>
        <p>{{ $post->body }}</p>

        <button class="btn btn-primary">
            <a href="/posts">Back to Post Index</a>
        </button>
    @endsection
