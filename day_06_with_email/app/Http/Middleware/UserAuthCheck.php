<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuthCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(!Auth::user() && ($request->path() !='login' && $request->path() !='registation')){
            return redirect('login')->with('key','warning');
        }

        if(Auth::user() && ($request->path() == 'login' || $request->path() == 'registation') ){
            return back();
        }

        return $next($request)->header('Cache-Control','no-cache, no-store, max-age=0, must-revalidate')
                              ->header('Pragma','no-cache')
                              ->header('Expires','Sat 01 Jan 1990 00:00:00 GMT');
    }
}
