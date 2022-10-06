<?php

namespace App\Http\Controllers;
use App\Models\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class Utilisateurs extends Controller
{
    public function tableau(){
        $user_info = DB::table('users')->select('id','first_name','last_name','email','profile','CIN')->get();
        $data = ['LoggedUserInfo'=>users::where('id','=', session('LoggedUser'))->first()]; 
        return  view('user_dashboard.utilisateurs.tableau',['users'=>$user_info],$data); 
    }
    public function Userdetail($id){
        $data=DB::table('bos')->where('id', $id)->get();
        return $data; 
    }
    public function deleteuser(Request $request,$id){
        if(DB::table('user_themes')->where('user_id',$id)->delete() and
        DB::table('users_activities')->where('user_id',$id)->delete() and
        DB::table('users')->where('id',$id)->delete())
        return redirect('/dashboard/utilisateurs/tableau')->with('dsuccess',"la suppression a été effectuée");
        return redirect('/dashboard/utilisateurs/tableau')->with('dfail',"un problème est survenu lors de la suppression,veuillez réessayer...");
    }
    public function updateuser(Request $request){
        $rules = [
           /* 'Nomentreprise' => 'required|string|max:25', */
           'Nom' => 'required|string|max:25',
           'Prenom' => 'required|string|max:25',
           'Email'=> 'required|email|string',
           'Profile'=> 'required|max:15',
           'cin'=>'required|max:10'
       ];
   
       $customMessages = [
           'required' => 'le champ :attribute est requis.',
           'email' => "l'email est incorrect.",
           'numeric' => "le numero de telephone n'est pas un numérique.",
           "string" => "vous devez entrer une chaîne de caractére.",
           "unique" => "l'email existe deja."
       ];
      $attributes=[
          'cin'=>'CIN'
      ];
   
       /* $this->validate($request, $rules, $customMessages); */
       $request->validateWithBag('updateuser',$rules, $customMessages,$attributes);
       if( DB::table('users')
              ->where('id', $request->id)
              ->update(['last_name'=>$request->Nom,'email' => $request->Email,'first_name'=>$request->Prenom,'profile'=>$request->Profile,'CIN'=>$request->cin]))
       return redirect('/dashboard/utilisateurs/tableau')->with('dsuccess',"la modification a été effectuée");
       return redirect('/dashboard/utilisateurs/tableau')->with('dfail',"un problème est survenu lors de la modification,veuillez réessayer...");
    }
    public function activite(){
        $users = DB::table('users')
         /*    ->join('user_themes', 'users.id', '=', 'user_themes.user_id')
            ->join('themes', 'themes.id', '=', 'user_themes.theme_id') */
            ->select( 'id','first_name', 'last_name')
           /*  ,'themes.name') */
            ->get();
            $themeusers=array();
        foreach($users as $k=>$v){
            $themeusers[$v->id]=DB::table('user_themes')
                                ->join('themes','themes.id','=','user_themes.theme_id')
                                ->where('user_id',$v->id)
                                ->pluck('themes.name');
        }
            $activityusers=array();
        foreach($users as $k=>$v){
            $activityusers[$v->id]=DB::table('users_activities')
                                ->join('activity','activity.id','=','users_activities.activity_id')
                                ->where('user_id',$v->id)
                                ->pluck('activity.name');
        }
            $LoggedUserInfo = users::where('id','=', session('LoggedUser'))->first();
        return view('user_dashboard.utilisateurs.activites',compact('users','themeusers','activityusers','LoggedUserInfo'));
 
    }
    public function adduser(Request $request){
        $rules = [
           /* 'Nomentreprise' => 'required|string|max:25', */
           'Nomu' => 'required|string|max:25',
           'Prenomu' => 'required|string|max:25',
           'Emailu'=> 'required|email|string|unique:users,email',
           'Profileu'=> 'required|max:15',
           'cin'=>'required|max:10'
       ];
   
       $customMessages = [
           'required' => 'le champ :attribute est requis.',
           'email' => "l'email est incorrect.",
           'numeric' => "le numero de telephone n'est pas un numérique.",
           "string" => "vous devez entrer une chaîne de caractére.",
           "unique" => "l'email existe deja."
       ];
       $attributes = [
        'Nomu' => 'Nom','Prenomu' => 'Prenom','Emailu' => 'Email','Profileu' => 'Profile','cin'=>'CIN'
    ];
       /* $this->validate($request, $rules, $customMessages); */
       $request->validateWithBag('adduser',$rules, $customMessages,$attributes);
      if(DB::table('users')->insert([
        'email' => $request->Emailu,
        'first_name'=> $request->Nomu,
        'last_name' => $request->Prenomu,
        'username'=> $request->Nomu,
        'CIN'=>$request->cin,
        'username_canonical'=> $request->Nomu,
        'email_canonical'=> $request->Emailu,
        'enabled'=>1,
        'password'=>123456,
        'roles'=>'a:0:{}',
        'profile'=>$request->Profileu
        ]))
       return redirect('/dashboard/utilisateurs/tableau')->with('dsuccess',"l'ajout a été éffectué avec succès");
       return redirect('/dashboard/utilisateurs/tableau')->with('dfail',"il y a un problème lors de l'enregistrement ! veuillez réessayer...");
    }
    public function theme(){
        $users = DB::table('users')
            ->join('user_themes', 'users.id', '=', 'user_themes.user_id')
            ->join('themes', 'themes.id', '=', 'user_themes.theme_id')
            ->select('users.first_name', 'users.last_name', 'users.id','themes.name')
            ->get();
            $data = ['LoggedUserInfo'=>users::where('id','=', session('LoggedUser'))->first()];
        return view('user_dashboard.utilisateurs.theme',['users'=>$users],$data);
 
    }
    /* SELECT `name` FROM `activity` WHERE id IN(SELECT `activity_id` FROM `users_activities` WHERE `user_id`=2) 
    SELECT name,users_activities.activity_id FROM `users_activities`,activity WHERE users_activities.activity_id=activity.id AND user_id=3
    */
    public function societies(){
        $societies = DB::table('societies')->get(); 
        $data = ['LoggedUserInfo'=>users::where('id','=', session('LoggedUser'))->first()];
        return  view('user_dashboard.utilisateurs.societies',['societies'=>$societies],$data); 
    }
    public function deletesociety(Request $request,$id){
        if(DB::table('societies')->where('id',$id)->delete())
        return redirect('/dashboard/utilisateurs/societies')->with('dsuccess',"la suppression a été effectuée");
        return redirect('/dashboard/utilisateurs/societies')->with('dfail',"un problème est survenu lors de la suppression,veuillez réessayer...");
    }

    public function updatesociety(Request $request){
        $rules = [ 
           'nameu' => 'required|string|max:30',
           'adresseu' => 'required|string|max:60',
           'telu'=> 'required|string',
           'faxu'=> 'required|string|max:15',
           'contact_nameu'=> 'required|string|max:25',
           'contact_telu'=> 'required|string',
           'contact_mailu'=> 'required|email',
           'ice' => 'required|string|max:15',
           'idf' => 'required|string|max:20',
           'rc' => 'required|string|max:20',
           'cnss' => 'required|string|max:20',
       'Npatente'=>'required|numeric',

       ];
   
       $customMessages = [
           'required' => 'le champ :attribute est requis.',
           'email' => "l'email est incorrect.",
           'numeric' => "le numero de telephone n'est pas un numérique.",
           "string" => "vous devez entrer une chaîne de caractére.",
           "unique" => "la société existe deja."
       ];
       $attributes = [
        'nameu' => 'Nom',
           'adresseu' => 'Adresse',
           'telu'=> 'Tel',
           'faxu'=> 'Fax',
           'contact_nameu'=> 'Nom Contact',
           'contact_telu'=> 'Tel Contact',
           'contact_mailu'=> 'Mail Contact',
            'Npatente'=>'N° Patente',
            'cin'=>'CIN',
            'ice'=>'ICE',
            'idf'=>'IF',
            'rc'=>'RC',
            'cnss'=>'CNSS'
    ];
   
       /* $this->validate($request, $rules, $customMessages); */
       $request->validateWithBag('updateuser',$rules, $customMessages,$attributes);
       if(DB::table('societies')
              ->where('id', $request->id)
              ->update(['name'=>$request->nameu,'adresse' => $request->adresseu,'tel'=>$request->telu,'fax'=>$request->faxu,'contact_name'=>$request->contact_nameu,'contact_tel'=>$request->contact_telu,'contact_mail'=>$request->contact_mailu,
              'patente'=>$request->Npatente,
                'ICE'=>$request->ice,
                'RC'=>$request->rc,
                'IDF'=>$request->idf,
                'CNSS'=>$request->cnss]))
       return redirect('/dashboard/utilisateurs/societies')->with('dsuccess',"la modification a été effectuée");
       return redirect('/dashboard/utilisateurs/societies')->with('dfail',"un problème est survenu lors de la modification,veuillez réessayer...");
    }
    public function addsociety(Request $request){
        $rules = [
            'name' => 'required|string|max:30',
            'adresse' => 'required|string|max:60',
            'tel'=> 'required|string',
            'fax'=> 'required|string|max:15',
            'contact_name'=> 'required|string|max:25',
            'contact_tel'=> 'required|string',
            'contact_mail'=> 'required|email',
            'ice' => 'required|string|max:15',
            'idf' => 'required|string|max:20',
            'rc' => 'required|string|max:20',
            'cnss' => 'required|string|max:20',
            'Npatente'=>'required|numeric',
 
        ];
    
        $customMessages = [
            'required' => 'le champ :attribute est requis.',
            'email' => "l'email est incorrect.",
            'numeric' => "le numero de telephone n'est pas un numérique.",
            "string" => "vous devez entrer une chaîne de caractére.",
            "unique" => "la société existe deja."
        ];
        $attributes = [
                'Npatente'=>'N° Patente',
                'cin'=>'CIN',
                'ice'=>'ICE',
                'idf'=>'IF',
                'rc'=>'RC',
                'cnss'=>'CNSS'
        ];

    
       /* $this->validate($request, $rules, $customMessages); */
       $request->validateWithBag('adduser',$rules, $customMessages,$attributes);
       if(DB::table('societies')->insert([
        'name'=>$request->name,'adresse' => $request->adresse,'tel'=>$request->tel,'fax'=>$request->fax,'contact_name'=>$request->contact_name,'contact_tel'=>$request->contact_tel,'contact_mail'=>$request->contact_mail,'patente'=>$request->Npatente,
        'ICE'=>$request->ice,
        'RC'=>$request->rc,
        'IDF'=>$request->idf,
        'CNSS'=>$request->cnss
        ]))
       return redirect('/dashboard/utilisateurs/societies')->with('dsuccess',"l'ajout a été éffectué avec succès");
       return redirect('/dashboard/utilisateurs/societies')->with('dfail',"il y a un problème lors de l'enregistrement ! veuillez réessayer...");
    }
    public function showupdate(Request $request,$id){
        $users=DB::table('users')->select('id','first_name','last_name')->get();
        $themes=DB::table('themes')->select('id','name')->get();
        $activity = DB::table('activity')->pluck('name','id'); 
        $data = ['LoggedUserInfo'=>users::where('id','=', session('LoggedUser'))->first()];
        return view("user_dashboard.utilisateurs.updateactivity.updateactivitie",['users'=>$users,'id'=>$id,'themes'=>$themes,'titles'=>$activity],$data);
    }
    public function updateuseractthe(Request $request,$id){
        
        $delete=DB::table('user_themes')->where('user_id',$id)->delete();
        $insert=0;
        foreach($request->theme as $k=>$v){
            $insert+=DB::table('user_themes')->insert(['theme_id'=>$v,'user_id'=>$request->Nom]);
        }
        $deleteactivity=DB::table('users_activities')->where('user_id',$id)->delete();
        $insertactivity=0;
        foreach($request->section as $k=>$v){
            $insert+=DB::table('users_activities')->insert(['activity_id'=>$v,'user_id'=>$request->Nom]);
        }
        if(($delete and $deleteactivity) or (($insert==count($request->theme))  and ($insertactivity==count($request->section))) ){
            return redirect('/dashboard/utilisateurs/activites_user')->with('dsuccess',"L'utilisateur choisi est bien modifié");
        }
         else{   
            return redirect('/dashboard/utilisateurs/activites_user')->with('dfail',"Un probleme lors de modification,veuilliez réssayer ");
        }    
    }
}
