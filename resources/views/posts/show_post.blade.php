@extends('partials/app')

@section('pageTitle')


    {{$pageTitle}}
@endsection

@section('bodyContent')
    <div class="jumbotron">
        @foreach($postData as $post)
            <div class="panel panel-default">


                <div class="panel-heading">
                    <h3 class="panel-title">{{$post->title}}</h3>
                </div>
                <div class="panel-body">

                    <p>{{$post->body}}</p>
                    <div class="caption"><em>By: {{$post->author}}</em></div>

                </div>

            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div>
                        <a class="btn btn-success btn-block" href="/posts">comment</a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div>
                        <a class="btn btn-danger btn-block" href="/post/{{$post->id}}/delete">delete</a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="">
                        <a class="btn btn-primary btn-block" href="/posts">back to the list</a>
                    </div>
                </div>
            </div>
        @endforeach


    </div>
@endsection

