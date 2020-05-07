<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class CheckUser
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
        if(Auth::check())
        {
            if (Auth::user()->user_level==0)
            {
                return $next($request);
            }
                    
        }
        return redirect('admin')->with('user_level','bạn không quyền truy cập');
        
       
        
    }
}
