<body>
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
                        href="{{ route('profiles.show', ['id' => $post->user->id]) }}">Posted by : {{$post->user->name}}</a>
                    </div>
                </div> 
                <br>
                
                <div class="bg-blue overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-blue-100 border-b border-gray-200">
                        {{$post->contents}} </li>
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
                        <p type="submit" class="text-center float-right bg-transparent text-blue-700 font-semibold py-2 px-4 border border-blue-500 rounded-full" >Post made on: {{date('d-m-Y', strtotime($post->created_at))}} </p>
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
            <div class="p-12 bg-white border-b border-gray-200">
                <ul>
                @if(!$post->comments->isEmpty())
                    @foreach ($post->comments as $comment)

                    <div class="bg-blue overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-blue-100 border-b border-gray-200">

                            <div class="flex flex-row content-evenly">
                                
                                <div class="w-1/2">
                                    <a class="float-left text-left bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-6 rounded-full" 
                                    href="{{ route('profiles.show', ['id' => $comment->user->id]) }}">By : {{$comment->user->name}}</a>
                                </div>
                                @can('update', $comment)
                                    
                                    <div class="w-1/10">
                                        <a class="float-right text-right bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-6 rounded-full" 
                                            href="{{ route('comments.updatePage', ['id' => $comment->id]) }}">Edit</a>
                                    </div>
                                    <br>
                                    <div class="w-1/2">
                                        <form method="POST"
                                            action="{{ route('comments.destroy', ['id' => $comment->id]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="float-right bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-4 rounded-full" >Delete</button>
                                        </form>
                                    </div>
                                    <br>
                                @endcan
                                <div class="w-1/2">
                                    <p type="submit" class="text-right float-right bg-transparent text-blue-700 font-semibold py-2 px-4 border border-blue-500 rounded-full" >Commented on: {{date('d-m-Y', strtotime($post->created_at))}} </p>
                                </div>
                            </div> 
                            <br>
                            <li>{{$comment->contents}}</li>
                        </div>
                    </div>
                    <br>
                    @endforeach
                    @endif
                </ul>
                <br>
                <div id="root">
                

                    <div class="max-w-10xl mx-auto  lg:px-1">
                        <div class="bg-blue-100 overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 bg-blue-100 border-b border-gray-200">
                            <p class="text-blue-400 text-xl font-bold">Add Comment</p>
                                <br>   
                                <textarea style="font-size: 20px; width: 100%; height: 100px; resize: none" type ="text" id="input" v-model="newContents"> </textarea>
                                <br>
                                <br>
                                <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full" @click="createComment">Comment</button>
                                <br>
                                <br>
                                <p class="text-red-400 text-xl">@{{errorMessage}}</p>
                                <p class="text-green-400 text-xl">@{{successMessage}}</p>
                            </div>
                        </div>
                    </div>  
                    <br>
                   
                   
                </div>
            </div>
        </div>
    </div>  
    <br>  

</x-app-layout>
</body>

<script>
     var app = new Vue({
        el: "#root",
        data: {
            comments: [],
            
            newContents: '',
            newPostId: {!! $post->id !!},
            newUserId: {!! Auth::user()->id !!},

            successMessage: "",
            errorMessage: '',
        },
        methods: {
            createComment: function(){
                this.errorMessage = ""
                axios.post("{{ route ('api.comments.store') }}",
                {
                    contents: this.newContents,
                    user_id: this.newUserId,
                    post_id: this.newPostId,
                })
                .then(response => {
                    this.comments.push(response.data);
                    this.errorMessage = ""
                    this.successMessage = "Comment Added Successfully"
                    this.newContents = ''
                })
                .catch(error => {
                    this.errorMessage = "Error : " + error.response.data.errors.contents[0];
                    console.log(error);
                })

                axios.post("{{ route ('api.comments.indexPost', ['id' => $post->id ]) }}", {
                params: {
                    id: this.newPostId,
                }
                })
                .then(response => {
                    window.location.reload();
                    this.comments = response.data;
                })
                .catch(error => {
                    console.log(response);
                })
            },
            editComment: function(id) {
                window.open("/comments/" + id + "/edit/","_self");
            },
            showUserProfile: function(id) {
                window.open("/profiles/" + id,"_self");
            },
            deleteComment: function(id) {
                axios.post("/api/comments/destroy/" + id)
                .then(response => {
                    window.location.reload();
                    this.comments.push(response.data);
                    this.errorMessage = ""
                    this.successMessage = "Comment Deleted Successfully"
                })
                .catch(error => {
                    this.errorMessage = "Error : " + error.response.data.errors.contents[0];
                    console.log(error);
                })
            }
        },
        mounted() {
            axios.post("{{ route ('api.comments.indexPost', ['id' => $post->id ]) }}", {
                params: {
                    id: this.newPostId,
                }
            })
            .then( response => {
                this.comments = response.data;
            })
            .catch(response => {
                console.log(response);
            })
        },
    });
</script>
