<?php

namespace App\Http\Controllers;
use App\Models\users;
use DB;
use Illuminate\Http\Request;


class ProfileController extends Controller
{
    public function index(){
      $data = users::where('id','=', session('LoggedSUser'))->first();
      $id_user=session('LoggedSUser');
        $users= DB::table('users')
        ->where('id','=',  $id_user)
        ->get();

        $id_society = DB::table('users')->where('id','=',$id_user)->value('society_id');
        $societie= DB::table('societies')->where('id','=', "$id_society")->get();
        $societies=$societie[0];
        
        $user_themes= DB::table('user_themes')->select('theme_id')->where('user_id','=', $id_user)->get();
        $nbr=count($user_themes);
        $array=array();
        for ($x = 0; $x <$nbr; $x++) {
            $array[$x]=$user_themes[$x]->theme_id;
          }
          
        $themes=array();
        for ($x = 0; $x <$nbr; $x++) {
            $themes[$x]=ucwords(strtolower(DB::table('themes')->where('id','=', $array[$x])->value('name')));
          }
          
        $id_activity=DB::table('users_activities')->select('activity_id')->where('user_id','=',$id_user)->get();
        $arr=array();
        $sections_id=array();
        $branches_id=array();
        $sousbranches_id=array();
        for ($x = 0; $x <count($id_activity); $x++) {
            $arr[$x]=$id_activity[$x]->activity_id;
            $sections_id[$x]=DB::table('activity')->where('id','=', $arr[$x])->value('section_id');
            $branches_id[$x]=DB::table('activity')->where('id','=', $arr[$x])->value('n1_activity_id');
            $sousbranches_id[$x]=DB::table('activity')->where('id','=', $arr[$x])->value('n2_activity_id');
          }
        $activity=array();
        $sections_id=array_unique($sections_id);
        for ($x = 0; $x <count($id_activity); $x++) {
            $activity[$x]=ucwords(strtolower(DB::table('activity')->where('id','=', $arr[$x])->value('name')));
        }
 
        $sections_name=array();
        $branches_name=array();
        $sousbranches_name=array();

        foreach(array_unique($sections_id) as $k=>$v){
          $c=DB::table('section')->where('id','=', $v)->value('name');
          array_push($sections_name, ucwords(strtolower($c)));
        }

        foreach(array_unique($branches_id) as $k=>$v){
          $c=DB::table('n1_activities')->where('id','=', $v)->value('name');
          array_push($branches_name, ucwords(strtolower($c)));
        }

        foreach(array_unique($sousbranches_id) as $k=>$v){
          $c=DB::table('n2_activities')->where('id','=', $v)->value('name');
          array_push($sousbranches_name, ucwords(strtolower($c)));
        }

        return view('Suser.profile.profile',compact('users','themes','societies','activity','sections_name','branches_name','sousbranches_name'));
    }
    public function userprofile(){
      $data = users::where('id','=', session('Loggedclient'))->first();
      $id_user=session('Loggedclient');
        $users= DB::table('users')
        ->where('id','=',  $id_user)
        ->get();
        $id_activity=DB::table('users_activities')->select('activity_id')->where('user_id','=',$id_user)->get();
        $arr=array();
         for ($x = 0; $x <count($id_activity); $x++) {
            $arr[$x]=$id_activity[$x]->activity_id;} 
        $activity=array();
        for ($x = 0; $x <count($id_activity); $x++) {
                    $activity[$x]=ucwords(strtolower(DB::table('activity')->where('id','=', $arr[$x])->value('name')));
                }
        return view('client.profile.profile',compact('users','activity'));
    }
    public function adminprofile(){
      $data = users::where('id','=', session('LoggedUser'))->first();
      $id_user=session('LoggedUser');
        $users= DB::table('users')
        ->where('id','=',  $id_user)
        ->get();
        return view('user_dashboard.profile.profile',compact('users'));
    }
}