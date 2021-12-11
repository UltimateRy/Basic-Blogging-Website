@extends('layouts.example')

@section('title', 'All Posts')

@section('content')

<form method="POST" action="{{ route('posts.store') }}">
    @csrf
    <p>Title: <input type="text" name="title"> </p>
    <p>Contents: <input type="text" name="contents"> </p>

@endsection