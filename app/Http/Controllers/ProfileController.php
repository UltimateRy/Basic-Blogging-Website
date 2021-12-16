<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Post;
use Auth;

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

        session()->flash('message', 'User Successfully Created.');

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

        $isFriend = (boolean) Auth::user()->friends()->where('users.id', $id)->count();
    

        return view('users.show', [
            'profile' => $user, 'posts' => $user->posts()->paginate(4), 'isFriend' => $isFriend,
        ]);
    }

    public function follow($id) 
    {
        $userToAdd = User::findOrFail($id);
        $user = Auth::user();
        
        if ($user->isFollowing($userToAdd)) {
            $user->removeFriend($userToAdd);
        } else {
            $user->addFriend($userToAdd);
        }
        return redirect()->route('profiles.show', [
            'id' => $userToAdd->id
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
