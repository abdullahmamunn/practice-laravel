<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthCheck
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
        // echo $request->path();
        // dd(Auth::user());
        // die();

        if(!Auth::user() && ($request->path() !='login' && $request->path() !='registation')){
            return redirect('login')->with('fail','You must be logged in');
        }

        if(Auth::user() && ($request->path() == 'login' || $request->path() == 'registation') ){
            return back();
        }
        
        return $next($request)->header('Cache-Control','no-cache, no-store, max-age=0, must-revalidate')
                              ->header('Pragma','no-cache')
                              ->header('Expires','Sat 01 Jan 1990 00:00:00 GMT');
    }
}
