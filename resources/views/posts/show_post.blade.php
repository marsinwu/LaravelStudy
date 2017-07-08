{{--Adding partial header--}}
@extends('partials/app')
{{--Generating page title--}}
@section('pageTitle')
    {{$pageTitle}}
@endsection

{{--Body content beginning--}}
@section('bodyContent')
    {{--Making stuff more outstanding by applying jumbotron--}}
    <div class="jumbotron">
        {{--Panel with the post details--}}
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 id="post-header" class="panel-title">{{$post->title}}</h3>
            </div>
            <div class="panel-body">

                <p id="post-body">{{$post->body}}</p>
                <div>
                    <img class="img-thumbnail" src="{{$post->img}}" alt="{{$post->title}}">
                </div>
                <div class="caption"><em>By: {{$post->author}}</em></div>
            </div>
        </div>

        {{--Row with buttons--}}
        <div class="row">
            <div class="col-sm-4">
                <div>
                    <a class="btn btn-success btn-block" href="/posts">comment</a>
                </div>
            </div>
            <div class="col-sm-4">
                <div>
                    <a class="btn btn-danger btn-block" href="/post/{{$post->id}}/delete">delete</a>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="">
                    <a class="btn btn-primary btn-block" href="/posts">back to the list</a>
                </div>
            </div>
        </div>
    </div>
    {{--End of body section--}}
@endsection

