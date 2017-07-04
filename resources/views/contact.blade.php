@extends('partials/app')

@section('pageTitle')
    {{$pageTitle}}
@endsection

@section('bodyContent')
    <h2>Contact Me</h2>
    <form>
        <label for="name">name</label>
        <input type="text" name="name" placeholder="your name">

        <label for="email">email</label>
        <input type="email" name="email" placeholder="your name">

        <label for="message">message</label>
        <textarea name="message">your message</textarea>

        <button>contact me</button>

    </form>

    <div>
        People who wrote already:

        <ul>
            @foreach($names as $name)
                <li>{{$name}}</li>
            @endforeach
        </ul>
    </div>
@endsection