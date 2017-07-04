@extends('partials/app')

@section('pageTitle')
    {{$pageTitle}}
@endsection

@section('bodyContent')
    <h3>This is post detail</h3>
    <ul>
        <li>Post id: {{$id}}</li>
    </ul>

    <div>
@endsection