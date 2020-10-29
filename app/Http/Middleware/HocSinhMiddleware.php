<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class HocSinhMiddleware
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
        if(Auth::check()){
            if(Auth::user()->quyen==0)
                return $next($request);
            else
                return redirect('/index');
        }else{
            return redirect('/index');
        }
    }
}
