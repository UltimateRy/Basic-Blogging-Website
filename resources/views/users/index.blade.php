@extends('layouts.example')

@section('title', 'All Users')

@section('content')

<!DOCTYPE html>
<html>
    <head>
        <title>Users</title>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
    <h1>Users</h1>
    <div id="root">
        <p>@{{ message }}</p>
    </div>

    <ul>
    @foreach ($users as $user)
        <li><h3>User ID: <a href="{{route('profiles.show', [ 'id' => $user->id ]) }}">{{$user->id}}</a></h3></li>
        <li><h3>Username: {{$user->username}}</h3></li>
        <li><h3>Name: {{$user->name}}</h3></li>
        <li><h3>Email: {{$user->email}}</h3></li>
        <li><h3>Password: {{$user->password}}</h3></li>
        <br>
        <br>
        <br>
    @endforeach
    </ul>

</body>

<script>
    var app = new Vue({
        el: "#root",
        data: {
            message: "It works",
        },
    });
</script>

</html>

@endsection