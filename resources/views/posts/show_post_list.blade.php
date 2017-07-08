{{--Getting page partial header--}}
@extends('partials/app')

{{--Generating page title --}}
@section('pageTitle')
    {{$pageTitle}}
@endsection

{{--Page body beginning--}}
@section('bodyContent')
    {{--Making content outstand by making it jumbotron--}}
    <div class="jumbotron">
        {{--Protecting from null value of postData --}}
        <h1>Posts</h1>
        {{--If data is null--}}
        @if($postData==null)
            {{--Letting user now there is no posts there--}}
            <div class="container"><h3>It seems there are no posts.</h3></div>
        @else
            {{--If the postData is not null continue with template--}}
            <div class="panel panel-default">
                <div class="container">
                    <h3>Live <i class="fa fa-bolt" aria-hidden="true"></i></h3></div>
                {{--Creating unorder list with posts--}}
                <ul id="posts-list" class="list-group">
                    {{--Iterating through the array of information--}}
                    @foreach($postData as $post)
                        <li id="post-item" class="list-group-item">
                            {{--Adding icon which will remove the post from the databse--}}
                            <a href="/post/{{$post->id}}/softdelete">
                                <span class="fa fa-trash"></span></a>
                            {{--Adding post title which is a link to particular post--}}
                            <a class="post-link" href="/post/{{$post->id}}">{{$post->title}}</a>
                            {{--Adding some caption data--}}
                            <small><em>---- By: {{$post->author }}, created: {{ $post->created_at}}</em></small>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="panel panel-default">
                <div class="container">
                    <h4>Deleted <i class="fa fa-trash" aria-hidden="true"></i></h4></div>
                {{--Creating unorder list with posts--}}
                <ul id="posts-list" class="list-group">
                    {{--Iterating through the array of information--}}
                    @foreach($trashedData as $trashedPost)
                        <li id="post-item-trashed" class="list-group-item">
                            {{--Adding icon which will remove the post from the databse--}}
                            <a id="perm-delete-link" href="/post/{{$trashedPost->id}}/permdelete">
                                <span class="fa fa-trash"></span></a>
                            <a href="/post/{{$trashedPost->id}}/restore">
                                <span class="fa fa-arrow-up"></span></a>

                            {{--Adding post title which is a link to particular post--}}
                            <a class="post-link" href="/post/{{$trashedPost->id}}">{{$trashedPost->title}}</a>
                            {{--Adding some caption data--}}
                            <small><em>---- By: {{$trashedPost->author }}, created: {{ $trashedPost->created_at}}</em>
                            </small>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
        {{--Adding button that would allow adding new post to the list--}}
        <div class="text-left">
            <a class="btn btn-info" href="/posts/new">add new post</a>
        </div>

    </div>

    {{--Page body finish--}}

    {{--Getting page partial footer--}}
@endsection

