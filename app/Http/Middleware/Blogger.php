<?php

namespace App\Http\Middleware;

use Closure;

class Blogger
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
        if(auth()->user()->role == "blogger" && auth()->user()->status =="active"){
            return $next($request);
        }else{
            if(auth()->user()->status == "inactive"){
                \Auth::logout();
                return redirect()->route('all')->with("error","Sorry!Admin has turned you inactive for now!");
            }
            return redirect()->route(auth()->user()->role);
        }
    }
}
