<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\users;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\hash;
use Illuminate\Support\Facades\Crypt;
class MainController extends Controller
{
    public function login()
    {
     return view('user_dashboard.login');
    }
    public function check(Request $req)
    {
        //return $req->input();
        $req->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);
        $email = $req->email;
        $pass = $req->password;
        $userInfo = users::where('email','=', $req->email)->first();
        if(!$userInfo){
            return back()->with('fail','on ne reconnait pas votre adresse email');
        }else{
            //check password
            if(Hash::check($req->password, $userInfo->password)){
                if ($userInfo->profile == 'Admin') {
                    $req->session()->put('LoggedUser', $userInfo->id);
                    return redirect('/acceuil');
                } else if($userInfo->profile == 'SUser'){
                    $req->session()->put('LoggedSUser', $userInfo->id);
                    return redirect('/SSynthese');
                }else{
                    $req->session()->put('Loggedclient', $userInfo->id);
                    return redirect('/user');
                }

            }else{
                return back()->with('fail','mot de passe incorrect');
            }
        }

    }
    function logout(){
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect('/sauthentifier');
        }
        if(session()->has('Loggedclient')){
            session()->pull('Loggedclient');
            return redirect('/sauthentifier');
        }
        if(session()->has('LoggedSUser')){
            session()->pull('LoggedSUser');
            return redirect('/sauthentifier');
        }
    }

    function home(){
        $users=DB::table('users')->count();
        $users_societies=DB::table('societies')->count();
        $theme=DB::table('themes')->count();
        $aspects=DB::table('n1_aspect')->count();
        $sousaspects=DB::table('n2_aspect')->count();
        $branches=DB::table('n1_activities')->count();
        $sousbranches=DB::table('n2_activities')->count();
        $activity=DB::table('activity')->count();
        $section=DB::table('section')->count();
        $bo=DB::table('bos')->count();
        $text=DB::table('text')->count();
        $rules=DB::table('rules')->count();
        $prefecture=DB::table('prefecture')->count();
        $region=DB::table('region')->count();
        $info=array('users'=>$users,'societies'=>$users_societies,'theme'=>$theme,
        'aspects'=>$aspects,'sousaspects'=>$sousaspects,'branches'=>$branches,
        'sousbranches'=>$sousbranches,'activity'=>$activity,'region'=>$region,
        'prefecture'=>$prefecture,'section'=>$section,'bo'=>$bo,'text'=>$text,'rules'=>$rules);
        $data = ['LoggedUserInfo'=>users::where('id','=', session('LoggedUser'))->first()];
        return view('user_dashboard.utilisateurs.synthese',['info'=>$info],$data);
    }
}
