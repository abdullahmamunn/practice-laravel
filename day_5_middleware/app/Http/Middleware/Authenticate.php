<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }

        // ->header('Cache-Control','no-cache, no-store, max-age=0, must-revalidate')
        // ->header('Pragma','no-cache')
        // ->header('Expires','Sat 01 Jan 1990 00:00:00 GMT')
    }
}
