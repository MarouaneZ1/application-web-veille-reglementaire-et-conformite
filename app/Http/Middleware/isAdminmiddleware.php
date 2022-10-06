<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class isAdminmiddleware
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
         $user_role = DB::table('users')->find(session('LoggedUser'));
         if(session('LoggedUser') && $user_role->profile == "Admin" && ($request->path() == '/sauthentifier' || $request->path() == 'sinscrire' ) ){
            return redirect()->back();
        }
        if(!session('LoggedUser') && ($request->path() !='sauthentifier' && $request->path() !='sinscrire' )){
           
            return redirect('sauthentifier')->with('fail','Vous devez être connecté');
        }
           
        
        return $next($request)->header('Cache-Control','no-cache, no-store, max-age=0, must-revalidate')
        ->header('Pragma','no-cache')
        ->header('Expires','Sat 01 Jan 1990 00:00:00 GMT');
        
    }
}
