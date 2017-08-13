<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class NotFoundIfHadAuth
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
        $count=User::all()->count();
        if($count>0){
            return abort('404');
        }
        return $next($request);
    }
}
