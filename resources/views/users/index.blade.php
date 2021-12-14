@extends('layouts.example')

@section('title', 'All Users')

@section('content')

<!DOCTYPE html>
<html>
    <head>
        <title>Profiles</title>
</head>

<body>
<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Profiles') }}
        </h2>
    </x-slot>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.24.0/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
    
    <div class="py-12">


        <div id="root">
            <ul>
                <li v-for="user in users">
                    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
                    
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            
                            <div class="p-6 bg-white border-b border-gray-200">
                                <a v-bind:href="'/profiles/' + user.id"><b>@{{ user.name }}</b></a>
                                <br>
                                Name : @{{ user.name }}
                                <br>
                                Email : @{{ user.email }}
                                <br>
                                Role : @{{ user.role }}
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                </li>
            </ul>   

                <h2>Create new user</h2>

                Username : <input type ="text" id="input" v-model="newUsername">
                <br>
                Name : <input type ="text" id="input" v-model="newName">
                <br>
                Email Address : <input type ="text" id="input" v-model="newEmail">
                <br>
                Password : <input type ="text" id="input" v-model="newPassword">
                <br>
                Role : <input type ="text" id="input" v-model="newRole">
                <br>
                <button @click="createUser">Create</button>

        </div>
    </div>

    <ul>
    @foreach ($users as $user)
        <li><h3>User ID: <a href="{{route('profiles.show', [ 'id' => $user->id ]) }}">{{$user->id}}</a></h3></li>
        <li><h3>Username: {{$user->username}}</h3></li>
        <li><h3>Name: {{$user->name}}</h3></li>
        <li><h3>Email: {{$user->email}}</h3></li>
        <br>
        <br>
        <br>
    @endforeach
    </ul>

    </div>

    </x-app-layout>

</body>

<script>
    var app = new Vue({
        el: "#root",
        data: {
            users: [],
            
            newUsername: '',
            newName: '',
            newEmail: '',
            newPassword: '',
            newRole: '',
        },
        methods: {
            createUser: function(){
                axios.post("{{ route ('api.profiles.store') }}",
                {
                    username: this.newUsername,
                    name: this.newName,
                    email: this.newEmail,
                    password: this.newPassword,
                    role: this.newRole,
                })
                .then(response => {
                    this.users.push(response.data);
                    this.newUsername = ''
                    this.newName = ''
                    this.newEmail = ''
                    this.newPassword = ''
                    this.newRole = ''
                })
                .catch(response => {
                    console.log(response);
                })
            }
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