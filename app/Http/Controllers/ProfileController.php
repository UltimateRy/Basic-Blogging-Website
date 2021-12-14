<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Post;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()    {
        //
        $users = User::all();
        //dd($users);
        return view('users.index', [
            'users' => $users
        ]);
    }

    public function apiIndex() {
        $users = User::all();
        return $users;
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
            'username' => 'required|max:255',
            'name' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'required|max:255',
            'role' => 'required|max:255',
        ]);

        $u = new User();
        $u->username = $request['username'];
        $u->name = $request['name'];
        $u->email = $request['email'];
        $u->password = $request['password'];
        $u->role = $request['role'];
        $u->save();

        return $u;
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
        $user = User::findOrFail($id);
       // $posts = Post::where('id' ,'=' ,$id)->get()->toarray();

        return view('users.show', [
            'profile' => $user, 'posts' => $user->posts()->paginate(2)
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
    }
}
