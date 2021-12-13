<?php
/*
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckIfOwns
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
       if($request->user_id !== \Auth::user()->id)
            return response('Access denied : You are not an admin or this is not your post');
        else
            return response('Access approved : You own this post');    
    }
}