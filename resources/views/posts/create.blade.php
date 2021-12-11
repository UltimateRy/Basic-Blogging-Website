@extends('layouts.example')

@section('title', 'Create New Post')

@section('content')

<form method="POST" action="{{ route('posts.store') }}">
    @csrf
    <p>Title: <input type="text" name="title"> </p>
    <p>Contents: <input type="text" name="contents"> </p>
    
    <input type="submit" value="Submit">
    <a href="{{route('posts.index') }}">Cancel</a>

@endsection