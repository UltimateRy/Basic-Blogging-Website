<?php

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
        //NOT TESTED

        if(\Auth::user()->isAdmin())
            return $next($request);
        elseif(\Auth::user()->posts()->contains('id', $request->id)
            return $next($request);
        else
            return response('Access denied');
    }
}
