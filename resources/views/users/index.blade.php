@extends('layouts.example')

@section('title', 'All Users')

@section('content')

<!DOCTYPE html>
<html>
    <head>
        <title>Profiles</title>
</head>

<body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.24.0/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
    <h1>Profiles</h1>
    <div id="root">
        <ul>
            <li v-for="user in users">@{{ user.name }} </li>
        </ul>   
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
            users: [],
        },
        mounted() {
            axios.get("{{ route ('api.profiles.index') }}")
            .then( response => {
                this.users = response.data;
            })
            .catch(response => {
                console.log(response);
            })
        },
    });
</script>

</html>

@endsection