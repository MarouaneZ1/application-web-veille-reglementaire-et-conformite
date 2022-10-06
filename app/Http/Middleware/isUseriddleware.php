<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class isUseriddleware
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
        $user_role = DB::table('users')->find(session('Loggedclient'));
        if(session('Loggedclient') && $user_role->profile == "User"){
            return $next($request);
        }else{
            return redirect('/sauthentifier')->with('fail','vous devez être connecté');
        }
    }
}
