@extends('layouts.app')

@section('title', 'Home')

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
        {{ $name }}
    </div>
@endsection