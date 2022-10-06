<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class isSUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {   $user_role = DB::table('users')->find(session('LoggedSUser'));
        if(session('LoggedSUser') && $user_role->profile == "SUser"){
            return $next($request);
        }else{
            return redirect('/sauthentifier')->with('fail','vous devez être connecté');
        }
        return $next($request);
    }
}
