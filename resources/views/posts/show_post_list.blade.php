@extends('partials/app')

@section('pageTitle')
    {{$pageTitle}}
@endsection

@section('bodyContent')
    <div class="jumbotron">
        <div class="panel panel-default">
            <ul class="list-group">
                @foreach($postData as $post)
                    <li id="post-item" class="list-group-item"><a href="/post/{{$post->id}}/delete"><span
                                    class="fa fa-remove"></span></a> <a href="/post/{{$post->id}}">{{$post->title}} </a>
                        <small><em>By:{{$post->author }}, created: {{ $post->created_at}}</em></small>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="text-left">
            <a class="btn btn-info" href="/posts/new">add new post</a>
        </div>

    </div>
@endsection

