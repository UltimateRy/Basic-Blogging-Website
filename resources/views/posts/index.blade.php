@extends('layouts.example')

@section('title', 'All Posts')

@section('content')


<ul>
    @foreach ($posts as $post)
        <li><h3>Post ID: {{$post->id}}</h3></li>
        <li><h3>Made by user: {{$post->user_id}}</h3></li>
        <li><h4>Post Contents: </h4></li>
        <li>{{$post->contents}}</li>
        <br>
        <br>
        <br>
    @endforeach
</ul>

@endsection