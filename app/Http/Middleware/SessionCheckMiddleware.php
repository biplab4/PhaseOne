<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SessionCheckMiddleware
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
        // if(!session()->has('user')){
        //     return redirect('login');
        // }


        $path = $request->path();
        $paraArray = $request->route()->parameters();
        $paratoString = implode("",$paraArray);
       

        if(($path== "login" || $path =="register") && session()->has('user')){
            return redirect('home');

        }
        elseif(($path== "home" || $path =="contactus" || $path =="userlist" || $path == "editUser/$paratoString") && !session()->has('user')){
            return redirect('login');
        }

        return $next($request);
    }
}
