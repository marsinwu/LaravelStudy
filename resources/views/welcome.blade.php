@extends('partials/app')

@section('pageTitle')
    {{$pageTitle}}
@endsection

@section('bodyContent')
    <div class="title">Laravel 5 - Wilk</div>


    <div>
        <a href="/about">About Me</a>
    </div>

    <div>
        <a href="post/create">Add new post</a>
    </div>

@endsection

