@extends('layouts.example')

@section('title', 'Profile')

@section('content')

<ul>
    <li>Username: {{$profile->username}} </li>
    <li>Name: {{$profile->name}} </li>
    <li>Email: {{$profile->email}} </li>
<ul>

<h1> {{$profile->username}}'s Posts:</h1>

<ul>
    @foreach ($profile->posts as $post)
        <li><h3>Post ID: {{$post->id}}</h3></li>
        <li><h4>Post Contents: </h4></li>
        <li>{{$post->contents}}</li>
        <br>
        <br>
        <br>
    @endforeach
</ul>

@endsection