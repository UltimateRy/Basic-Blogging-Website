@extends('layouts.example')

@section('title', 'User Profile')

@section('content')

<ul>
    <li>Username: {{$profile->username}} </li>
    <li>Name: {{$profile->name}} </li>
    <li>Email: {{$profile->email}} </li>
<ul>

@endsection