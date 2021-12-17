<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <p class="text-blue-400 text-xl font-bold "> Welcome, {{ Auth::user()->name }}. You're logged in! </p>
                </div>
            </div>
        </div>
        <br>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 w:full">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a class=" align-middle float-left text-center bg-green-500 
                    hover:bg-green-700 text-white font-bold py-2 px-8 w-1/4 rounded-full" 
                    href="{{ route('posts.create') }}">
                    <p class="text-3xl font-bold ">Add New Post</p>

                    </a>
                    <br>
                    <br>
                </div>
            </div>
        </div>
        <br>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p class="text-blue-400 text-xl font-bold "> Posts from people you follow</p>
                </div> 
                <br>
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    @foreach ($friends_posts as $friends_post)
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 bg-blue-100 border-b border-gray-200">
                                <div class="flex flex-row content-evenly">
                                    <div class="w-1/3">
                                        Posted by : <a class="text-center bg-blue-500 hover:bg-blue-700 text-white font-bold px-3 w-1/4 rounded-full" 
                                        href="{{route('profiles.show', [ 'id' => $friends_post->user_id ]) }}"> {{$friends_post->user->name}}</a>
                                    </div>
                                    <div class="w-1/2">
                                        <p type="submit" class="text-center float-right bg-transparent text-blue-700 font-semibold py-1 px-4 border border-blue-500 rounded-full" >Post made on: {{date('d-m-Y', strtotime($friends_post->created_at))}} </p>
                                    </div>
                                </div>
                                <br>
                            
                                <a href="{{route('posts.show', [ 'id' => $friends_post->id ]) }}"><b>
                                <p class="text-blue-400 transparent text-2xl font-bold">{{$friends_post->title}} </p></b></a>
                                <br>
                                {{$friends_post->contents}}
                                
                            </div>
                        </div>
                    <br>
                    @endforeach
                    {{$friends_posts->links() }}
                    <br>
                </div>      
            </div>
        </div>
    </div>
</x-app-layout>
