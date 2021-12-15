
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post') }}
        </h2>
    </x-slot>


    <div class="pt-12 max-w-6xl mx-auto sm:px-6 lg:px-8 w:full">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="flex flex-row content-evenly">
                    <div class="w-1/2">
                    <p class="text-blue-400 text-3xl font-bold">{{$post->title}} </p>
                    </div>
                    <div class="w-1/2">
                        <a class="float-right text-right bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-6 rounded-full" 
                        href="{{ route('profiles.show', ['id' => $post->user->id]) }}">Posted by : {{$post->user->username}}</a>
                    </div>
                </div> 
                <br>
                
                <div class="bg-blue overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-blue-100 border-b border-gray-200">
                        Contents: {{$post->contents}} </li>
                        <br>
                    </div>
                </div>
                <br>
                <div class="flex flex-row content-evenly">

                
                    @can('update', $post)
                    <div class="w-1/3">
                        <a class="float-left text-left bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-6 rounded-full" 
                        href="{{ route('posts.updatePage', ['id' => $post->id]) }}">Edit Post</a>
                    </div>
                    <br>
                    <div class="w-1/3">
                        <form method="POST"
                            action="{{ route('posts.destroy', ['id' => $post->id]) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full" >Delete Post</button>
                        </form>
                    </div>
                    @endcan
                    <div class="w-1/3">
                        <p type="submit" class="text-center bg-transparent text-blue-700 font-semibold py-2 px-4 border border-blue-500 rounded-full" >Post made on: {{date('d-m-Y', strtotime($post->created_at))}} </p>
                    </div>
                </div>      
            </div>
        </div>
    </div>

    <div class="py-6 max-w-6xl mx-auto sm:px-6 lg:px-8 w:full">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
            <p class="text-blue-400 text-xl font-bold">Comments</p>
            </div>
        </div>
    </div>

    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 w:full">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <ul>
                    @foreach ($post->comments as $comment)

                    <div class="bg-blue overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-blue-100 border-b border-gray-200">

                            <div class="flex flex-row content-evenly">
                                <div class="w-1/2">
                                    <p class="text-blue-400 text-xl font-bold">{{$comment->contents}} </p>
                                </div>
                                <div class="w-1/2">
                                    <a class="float-right text-right bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-6 rounded-full" 
                                    href="{{ route('profiles.show', ['id' => $comment->user->id]) }}">Comment by : {{$comment->user->name}}</a>
                                </div>
                            </div> 
                            <br>
                            <li>{{$comment->contents}}</li>
                            <br>
                            <div class="flex flex-row content-evenly">
                                @can('update', $comment)
                                    
                                        <div class="w-1/3">
                                            <a class="float-left text-left bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-6 rounded-full" 
                                                href="{{ route('posts.updatePage', ['id' => $post->user->id]) }}">Edit</a>
                                        </div>
                                        <br>
                                        <div class="w-1/3">
                                            <form method="POST"
                                                action="{{ route('posts.destroy', ['id' => $post->id]) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full" >Delete</button>
                                            </form>
                                        </div>
                                        <div class="w-1/3">
                                            <p type="submit" class="text-center bg-transparent text-blue-700 font-semibold py-2 px-4 border border-blue-500 rounded-full" >Commented on: {{date('d-m-Y', strtotime($post->created_at))}} </p>
                                        </div>
                                @endcan
                            </div>
                        </div>
                    </div>
                    <br>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <br>
</x-app-layout>
