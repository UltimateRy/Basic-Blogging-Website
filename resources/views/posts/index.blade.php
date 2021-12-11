@extends('layouts.example')

@section('title', 'All Posts')

@section('content')


<ul>
    @foreach ($posts as $post)
        <li><h3>Post ID: <a href="/posts/{{$post->id}}">{{$post->id}}</a></h3></li>
        <li><h3>Made by user: <a href="/profiles/{{$post->user_id}}">{{$post->user_id}}</a></h3></li>
        <li><h4>Post Contents: </h4></li>
        <li>{{$post->contents}}</li>
        <br>
        <br>
        <br>
    @endforeach
</ul>

@endsection