<head>     
        <title>Profile</title>
</head>

<x-app-layout>

<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post') }}
        </h2>
    </x-slot>

<br>

<div class="py-4">
    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 flex items-stretch">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                    @csrf
                    <p>Title: <br><br> <input type="text" style="font-size: 20px; width: 655px;" name="title"
                    value="{{ old('title')}}"></p>
                    <br> 
                    <br>
                    <p>Contents: <br> <br> <textarea style="font-size: 20px; width: 655px; height: 300px; resize: none" name="contents"
                    value="{{ old('contents')}}"></textarea></p>
                    <br>
                    <p>Add Image: </p>
                    <br>
                    <div class="form-group">
                        <input type="file" name="file">
                    </div>
                    <br>
                    <div class="panel__btn">
                        <input type="submit" value="Submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-6 rounded-full">
                    </div>
                    <br>
                    
                    <div class="panel__btn">
                        <a href="{{route('dashboard') }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-6 rounded-full">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



</x-app-layout>

