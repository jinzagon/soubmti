<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Session;

class Admin
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


         if(!Auth::user()->admin) 
         {
                Session::flash('status','Vous ne disposez pas des permissions Admin.');

                return redirect()->back();
         }  

        return $next($request);
    }
}
