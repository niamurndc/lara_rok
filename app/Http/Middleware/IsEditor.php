<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsEditor
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
        if(auth()->user()->role == 'editor' || auth()->user()->role == 'admin'){
            return $next($request);
        }else{
            return redirect()->back();
        }
   
        return redirect('home')->with('error',"You don't have access.");
    }
}
