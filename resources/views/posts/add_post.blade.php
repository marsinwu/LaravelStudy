@extends('partials/app')

@section('pageTitle')
    {{$pageTitle}}
@endsection

@section('bodyContent')

    <div class="jumbotron">
        <div class="text-center">
            <h2>Add post</h2>
        </div>

        <form method="post" action="/posts">

            <div class="form-group">
                <input required placeholder="title" class="form-control" type="text" name="post[title]"/>
            </div>

            <div class="form-group">

                        <textarea required placeholder="post text" class="form-control" type="text"
                                  name="post[body]"></textarea>
            </div>

            <div class="form-group">
                <input required type="url" placeholder="post image url" class="form-control"
                       name="post[img]"/>
            </div>

            <div class="form-group">
                <input required type="text" placeholder="your pen name" class="form-control"
                       name="post[author]"/>
            </div>

            <div class="form-group">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button class="btn btn-default btn-primary btn-block" type="submit">add new post</button>
            </div>
        </form>
    </div>
@endsection