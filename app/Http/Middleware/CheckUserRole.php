<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;

class CheckUserRole
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



        if(!Auth::user()){
            return redirect('/login');
        }
        elseif(Auth::check() && Auth::user()->role == 'admin' || Auth::user()->role == 'supervisor'){
            return $next($request);    
        }
        else{
            return redirect()->back();
        }
    }
}
