@extends('layouts.example')

@section('title', 'All Users')

@section('content')

<ul>
    @foreach ($users as $user)
        <li><h3>User ID: <a href="/profiles/{{$user->id}}">{{$user->id}}</a></h3></li>
        <li><h3>Username: {{$user->username}}</h3></li>
        <li><h3>Name: {{$user->name}}</h3></li>
        <li><h3>Email: {{$user->email}}</h3></li>
        <li><h3>Password: {{$user->password}}</h3></li>
        <br>
        <br>
        <br>
    @endforeach
</ul>

@endsection