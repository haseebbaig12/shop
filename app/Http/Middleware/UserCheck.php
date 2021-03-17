<?php

namespace App\Http\Middleware;
use App\Helpers\Qs;
use Closure;
use Illuminate\Http\Request;
use Auth;
class UserCheck
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
        if(Auth::check()&& Qs::userIsAdmin()){
            return $next($request);
        }

        elseif (Auth::check()&& Qs::userIsClient()){
            return redirect('/');
        }
//        return (Auth::check() && Qs::userIsAdmin()) ? $next($request) : redirect()->route('login');
    }
}
