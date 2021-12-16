<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8 w:full">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="flex flex-row">
                    <div class="w-1/2 px-8">
                        <p class="text-blue-400 text-3xl font-bold text-right">{{$profile->username}} </p>
                        <br>
                    </div>
                    <div class="w-1/2 px-2">
                        @if (!(Auth::user()->id ==  $profile->id))
                            @if ($isFriend)
                                <a class="text-left float-left bg-transparent text-green-700 font-semibold py-2 px-6 border border-green-500 rounded-full"
                                href="{{route('profiles.follow', [ 'id' => $profile->id ]) }}"> Following </a>
                            @else
                                <a class="float-left text-left bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-9 rounded-full"
                                href="{{route('profiles.follow', [ 'id' => $profile->id ]) }}"> Follow </a>
                            @endif
                        @endif
                    </div>
                </div> 
                <div class="flex flex-row">
                    <div class="w-1/2 px-6">
                        <div class="bg-gray-200 overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 bg-gray-100 border-b border-gray-200 text-center">
                                <p class="text-blue-400 text-xl font-bold text-center">{{$profile->name}} </p>
                            </div>
                        </div>
                    </div>
                    <div class="w-1/2">
                    <div class="bg-gray-100 overflow-hidden shadow-sm sm:rounded-lg text-center">
                            <div class="p-6 bg-gray-100 border-b border-gray-200">
                                <p class="text-blue-400 text-xl font-bold text-center">{{$profile->email}} </p>
                            </div>
                        </div>
                    </div>
                </div>  
                <br>         
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 w:full" >
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
            <p class="text-blue-400 text-2xl font-bold text-center"> Posts</p>
                <br>
                <ul>
                    @foreach ($posts as $post)
                    <div class="max-w-8xl mx-auto sm:px-4 lg:px-4 w:full" onclick="location.href='{{route('posts.show', [ 'id' => $post->id ]) }}';" style="cursor: pointer;">
                        <div class="bg-blue-200 overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 bg-blue-100 border-b border-gray-200">
                                <p class="text-blue-400 transparent text-2xl font-bold">{{$post->title}}</p>
                                <br>
                                <p class="text-m text-black">{{$post->contents}}</p>
                                <br>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    @endforeach
                    {{$posts->links() }}
                </ul>
            </div>
        </div>
    </div>
    <br>
    <br>
</x-app-layout>