<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

<ul>
    <div class="py-12 max-w-10xl mx-auto sm:px-6 lg:px-8 w:full">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <p class="text-blue-600 text-3xl font-bold text-center">{{$profile->username}} </p>
            </div>
        </div>
    </div>
    <div class="flex flex-row">
        <div class="w-1/2 px-12">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p>{{$profile->name}} </p>
                </div>
            </div>
        </div>
        <div class="w-1/3">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p>{{$profile->email}} </p>
                </div>
            </div>
        </div>
    </div>
<ul>
<br>

<div class="max-w-10xl mx-auto sm:px-6 lg:px-8 w:full" >
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
        <p class="text-blue-600 text-3xl font-bold"> {{$profile->username}}'s Posts:</p>
            <br>

            <ul>
                @foreach ($posts as $post)
                    <li><h3>Post ID: <a href="{{route('posts.show', [ 'id' => $post->id ]) }}">{{$post->id}}</a></h3></li>
                    <li><h4>Post Contents: </h4></li>
                    <li>{{$post->contents}}</li>
                    <br>
                    <br>
                    <br>
                @endforeach
                {{$posts->links() }}
            </ul>
        </div>
    </div>
</div>


</x-app-layout>