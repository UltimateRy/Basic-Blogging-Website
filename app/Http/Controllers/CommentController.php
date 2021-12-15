<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Post;
use App\Models\Comment;


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
        return response('Access approved : You can edit this comment');
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
            'contents' => 'required|max:255',
        ]);

        Comment::find($id)->update([
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
        //
        $commentForDeletion = Comment::findOrFail($id);

        if (! Gate::allows('delete-comment', $commentForDeletion)) {
            return response('Access denied : You cannot delete this comment');
        }
    
        //return response('Access approved : You can delete this comment');
        
        //UNCOMMENT THESE
        //$commentForDeletion->delete();
        return redirect()->route('posts.show', ['id' => $commentForDeletion->post_id])->with('message', 'Comment deleted.');

    }
}
