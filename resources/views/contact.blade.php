@extends('partials/app')

@section('pageTitle')
    {{$pageTitle}}
@endsection

@section('bodyContent')
    <div class="jumbotron">
        <div class="text-center">
            <h2>contact me</h2>
        </div>

        <form method="post" action="/">
            <div class="form-group">
                <input required placeholder="your name" class="form-control" type="text" name="message[name]"/>
            </div>

            <div class="form-group">

                        <textarea required placeholder="message" class="form-control" type="text"
                                  name="message[text]"></textarea>
            </div>

            <div class="form-group">
                <input required type="email" placeholder="your email" class="form-control"
                       name="message[email]"/>
            </div>

            <div class="form-group">
                <button class="btn btn-default btn-primary btn-block" type="submit">write me</button>
            </div>
        </form>
    </div>

    <div>
        People who wrote already:

        <ul class="list-group">
            @foreach($names as $name)
                <li class="list-group-item">{{$name}}</li>
            @endforeach
        </ul>
    </div>
@endsection