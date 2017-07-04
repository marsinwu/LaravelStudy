@extends('partials/app')

@section('pageTitle')
    {{$pageTitle}}
@endsection

@section('bodyContent')
    <h4>
        This is going to be post number: {{$id}}
    </h4>
    <form>
        <input type="text">
        <input type="text">
        <button type="button" class="btn btn-primary">add</button>
    </form>
@endsection