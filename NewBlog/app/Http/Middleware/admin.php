<?php

namespace App\Http\Middleware;

use Session;
use Auth;
use Closure;

class admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!Auth::user()->admin){

            Session::flash('info','You do not have any permission for this section');

            return redirect()->back();
        }
        return $next($request);
    }
}
