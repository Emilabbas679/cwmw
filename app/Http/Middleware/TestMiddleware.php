<?php

namespace App\Http\Middleware;

use Closure;
use http\Client\Curl\User;
use Illuminate\Support\Facades\Auth;
use App;

class TestMiddleware
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
        if (!Auth::guest()) {
            if ($request->user()->status >= 1) {

            } else {
               return redirect('/');
            }
        }
        else{
            return redirect('/login');
        }

        return $next($request);
    }
}
