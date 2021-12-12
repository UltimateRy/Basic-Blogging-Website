<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Welcome, {{ Auth::user()->name }}. You're logged in!
                </div>
            </div>
        </div>
        <br>
        @foreach ($friends_posts as $friends_post)
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Posted by <a href="{{route('profiles.show', [ 'id' => $friends_post->user_id ]) }}">{{$friends_post->user->username}}</a>
                    <br>
                    <b>{{$friends_post->title}}</b>
                    <br>
                    {{$friends_post->contents}}
                </div>
            </div>
        </div>
        <br>
        @endforeach
    </div>
</x-app-layout>
