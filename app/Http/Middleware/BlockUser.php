<?php

namespace App\Http\Middleware;

use Closure;

use Auth;

class BlockUser
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
        

        if( Auth::user()->block == 1){
            Auth()->logout();
            return redirect()->route('login')->with('message','Your Account Is Blocked');
        }
        else{
        return $next($request);

       }
        
            
    }
}
