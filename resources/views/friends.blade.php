<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Friends') }}
        </h2>
    </x-slot>
    <br>
    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p class="text-blue-400 text-xl font-bold "> You are following</p>
                </div> 
                <br> @foreach ($friends as $friend)
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                   
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 bg-blue-100 border-b border-gray-200">
                                <a class="text-center bg-blue-500 hover:bg-blue-700 text-white font-bold px-3 w-1/4 rounded-full" 
                                 href="{{route('profiles.show', [ 'id' => $friend->id ]) }}"> {{$friend->username}}</a>
                                 <br>
                                 <br>
                                 <a href="{{route('profiles.show', [ 'id' => $friend->id ]) }}"><b>
                                <p class="text-blue-400 transparent text-2xl font-bold">{{$friend->name}} </p></b></a>
                            </div>
                        </div>
                    <br>
                </div>       
                @endforeach
            </div>
        </div>
</x-app-layout>
