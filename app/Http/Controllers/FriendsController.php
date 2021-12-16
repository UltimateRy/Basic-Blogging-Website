<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class FriendsController extends Controller
{
    //

    public function index()
    {
        //

        $friends = Auth::user()->friends;

        $users = User::all();

        return view('friends', [
            'friends' => $friends
        ]);

    }


}
