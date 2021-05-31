<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleCheck
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
        if(session()->has('LoggedUser') && (session()->get('LoggedUser')->role ==0 || session()->get('LoggedUser')->role ==2)){
            return $next($request);
        }
        
        return redirect('taskDesc');
    }
}
