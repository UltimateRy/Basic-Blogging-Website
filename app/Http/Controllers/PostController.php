<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Post;
use App\Models\Comment;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $posts = Post::all();
        return view('posts.index', [
            'posts' => $posts
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //dd($request['title']);

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'contents' => 'required|max:255',
        ]);

        //return "Passed Validation";

        $a = new Post;
        $a->title = $validatedData['title'];
        $a->contents = $validatedData['contents'];
        $a->user_id = 1;
        $a->save();

        session()->flash('message', 'Post Successfully Created.');
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
         //
         $post = Post::findOrFail($id);
         // $posts = Post::where('id' ,'=' ,$id)->get()->toarray();
  
         return view('posts.show', [
              'post' => $post, 'comments' => $post->comments()
         ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $postForEditing = Post::findOrFail($id);

        if (! Gate::allows('update-post', $postForEditing)) {
            return response('Access denied : You cannot edit this post');
        }
        return response('Access approved : You can edit this post');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'contents' => 'required|max:255',
        ]);

        Post::find($id)->update([
            'title' => request('title'),
            'contents' => request('contents'),
        ]);
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $postForDeletion = Post::findOrFail($id);

        if (! Gate::allows('delete-post', $postForDeletion)) {
            return response('Access denied : You cannot delete this post');
        }
        
        return response('Access approved : You can delete this post');
        
        //UNCOMMENT THESE
        //$postForDeletion->delete();
        //return redirect()->route('posts.index')->with('message', 'Post was deleted.');
    }
}
