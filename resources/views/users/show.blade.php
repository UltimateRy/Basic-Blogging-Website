<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-6xl mx-auto sm:px-6 lg:px-8 w:full">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <p class="text-blue-400 text-3xl font-bold text-center">{{$profile->username}} </p>
                <br>
                <div class="flex flex-row">
                    <div class="w-1/2 px-6">
                        <div class="bg-gray-200 overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 bg-gray-100 border-b border-gray-200 text-center">
                                <p>{{$profile->name}} </p>
                            </div>
                        </div>
                    </div>
                    <div class="w-1/2">
                    <div class="bg-gray-100 overflow-hidden shadow-sm sm:rounded-lg text-center">
                            <div class="p-6 bg-gray-100 border-b border-gray-200">
                                <p>{{$profile->email}} </p>
                            </div>
                        </div>
                    </div>
                </div>  
                <br>         
            </div>
        </div>
    </div>

    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 w:full" >
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