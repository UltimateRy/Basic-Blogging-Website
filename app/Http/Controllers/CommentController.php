<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Post;
use App\Models\Comment;
use Auth;
use Session;


class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function apiIndex() {
        $comments = Comment::all();
        return $comments;
    }

    public function apiIndexPost(Request $request) {

        $userComments = Comment::with('user')->where('post_id', $request->id)->get();
        return $userComments;
        
        //THIS RETURNS ALL COMMENTS WITH USERS AND WORKS
        //$userComments = Comment::with('user')->get();
        //return $userComments;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    public function apiStore(Request $request)
    {
        $validatedData = $request->validate([
            'contents' => 'required|max:255',
        ]);

        //dd( $request);

        $c = new Comment();
        $c->contents = $request['contents'];
        $c->user_id = $request['user_id'];
        $c->post_id = $request['post_id'];
        
        
        //return response('Access approved : You can post this comment');

        $c->save();

        session()->flash('message', 'Comment Successfully Added.');

        return $c;
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
        $commentForEditing = Comment::findOrFail($id);

        if (! Gate::allows('update-comment', $commentForEditing)) {
            return response('Access denied : You cannot edit this comment');
        }

        return view('comments.edit', [
            'comment' => $commentForEditing
        ]);
        //return response('Access approved : You can edit this comment');
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

        $commentForUpdating = Comment::findOrFail($id);

        $validatedData = $request->validate([
            'contents' => 'required|max:255',
        ]);

        Comment::find($id)->update([
            'contents' => request('contents'),
        ]);


        return redirect()->route('posts.show', ['id' => $commentForUpdating->post_id])->with('message', 'Comment updated.');

    }

    /**
     * Remove the specified resource from storage.
        
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $commentForDeletion = Comment::findOrFail($id);

        if (! Gate::allows('delete-comment', $commentForDeletion)) {
            return response('Access denied : You cannot delete this comment');
        }     
        $commentForDeletion->delete();
        return redirect()->route('posts.show', ['id' => $commentForDeletion->post_id])->with('message', 'Comment deleted.');

    }

    public function apiDestroy($id) {

        $commentForDeletion = Comment::findOrFail($id);

        $commentForDeletion->delete();
        return response('Access approved : You can delete this comment');
    }
}
