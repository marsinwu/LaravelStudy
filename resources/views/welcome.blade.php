@extends('partials/app')

@section('pageTitle')
    {{$pageTitle}}
@endsection

@section('bodyContent')


    <div class="jumbotron">
        <div><h1>LaravelNewApp</h1></div>
        <h3>Yet another laravel
            <del>nice</del>
            cool blog
        </h3>
    </div>

    <div class="lead">
        <h1>Laravel 5 -Wilk</h1>
    </div>


    <div>
        <a href="/about">About Me</a>
    </div>

    <div class="">
        <a href="/posts/new">Add new post</a>
    </div>

@endsection

