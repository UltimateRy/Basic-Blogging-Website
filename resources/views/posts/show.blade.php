@extends('layouts.example')

@section('title', 'Post')

@section('content')

<ul>
    <li>Post ID: {{$post->id}} </li>
    <li>Contents: {{$post->contents}} </li>
    <li>Post made on: {{$post->created_at}} </li>
<ul>

@can('update', $post)
<form method="POST"
    action="{{ route('posts.destroy', ['id' => $post->id]) }}">
    @csrf
    @method('DELETE')
    <button type="submit">Delete</button>
</form>
@endcan

<h1> Post ID: {{$post->id}}'s Comments:</h1>

<ul>
    @foreach ($post->comments as $comment)
        <li><h3>Comment ID: {{$comment->id}}</h3></li>
        <li><h3>Made by user: <a href="{{route('profiles.show', [ 'id' => $comment->user_id ]) }}">{{$comment->user_id}}</a></h3></li>
        <li><h4>Comment Contents: </h4></li>
        <li>{{$comment->contents}}</li>
        <br>
        <br>
        <br>
    @endforeach
</ul>

@endsection