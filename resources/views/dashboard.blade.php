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
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        @foreach ($friends_posts as $friends_post)
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Posted by <u><a href="{{route('profiles.show', [ 'id' => $friends_post->user_id ]) }}">{{$friends_post->user->username}}</u></a>
                    <br>
                    <a href="{{route('posts.show', [ 'id' => $friends_post->id ]) }}"><b>{{$friends_post->title}}</b></a>
                    <br>
                    {{$friends_post->contents}}
                </div>
            </div>
        <br>
        @endforeach
        {{$friends_posts->links() }}
    </div>
    </div>
</x-app-layout>
