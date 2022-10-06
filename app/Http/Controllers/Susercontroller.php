<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Notifications\Notifiable;
use App\Notifications\PasswordNotify;
use App\Notifications\AssignNotify;




class Susercontroller extends Controller
{
   public function synthese(){
       return view('Suser.SSynthese');
   }


    public function tableau(){
        $soc = DB::table('users')->where('id','=', session('LoggedSUser'))->first(); 
        
        $utilisateurs = DB::table('users')
                                ->select('id','first_name','CIN','last_name','email','Tel')
                                ->where('society_id',$soc->society_id)
                                ->where('profile','User')
                                ->get();
        $themeusers=array();

        foreach($utilisateurs as $k=>$v){
            $themeusers[$v->id]=DB::table('user_themes')
                                ->join('themes','themes.id','=','user_themes.theme_id')
                                ->where('user_id',$v->id)
                                ->pluck('themes.name');
        }
        return view('Suser.Utilisateurs',compact('utilisateurs','themeusers')); 
    }
    public function edit(Request $request,$id){
        $rules = [
            /* 'Nomentreprise' => 'required|string|max:25', */
            'Nom' => 'required|string|max:25',
            'Prenom' => 'required|string|max:25',
            'Email'=> 'required|email|string',
            'Tel'=> 'required|numeric',
            'cin'=> 'required|max:10',
            'theme'=>'required',
        ];
    
        $customMessages = [
            'required' => 'Le champ :attribute est requis.',
            'email' => "L'email est incorrect.",
            'numeric' => "Entrez un numero de telephone valide.",
            "string" => "Vous devez entrer une chaîne de caractére.",
        ];
        $request->validate($rules, $customMessages);
        $delete=DB::table('user_themes')->where('user_id',$id)->delete();
        $insert=0;
        foreach($request->theme as $k=>$v){
            $insert+=DB::table('user_themes')->insert(['theme_id'=>$v,'user_id'=>$id]);
        }
        $update=DB::table('users')->where('id', $id)->update(['last_name'=>$request->Nom,'email' => $request->Email,'first_name'=>$request->Prenom,'Tel'=>$request->Tel,'CIN'=>$request->cin]);
        if($update or $delete and ($insert==count($request->theme))){
            $soc = DB::table('users')->where('id','=', session('LoggedSUser'))->first(); 
            $utilisateurs = DB::table('users')
                                    ->select('id','first_name','CIN','last_name','email','Tel')
                                    ->where('society_id',$soc->society_id)
                                    ->where('profile','User')
                                    ->get();
            $themeusers=array();
        foreach($utilisateurs as $k=>$v){
            $themeusers[$v->id]=DB::table('user_themes')
                                ->join('themes','themes.id','=','user_themes.theme_id')
                                ->where('user_id',$v->id)
                                ->pluck('themes.name');
        }
            $satustrue="L'utilisateur choisi est bien modifié";
            return view('Suser.Utilisateurs',compact('utilisateurs','themeusers','satustrue'));
        }
        else{
            $soc = DB::table('users')->where('id','=', session('LoggedSUser'))->first(); 
            $utilisateurs = DB::table('users')
                                    ->select('id','first_name','CIN','last_name','email','Tel')
                                    ->where('society_id',$soc->society_id)
                                    ->where('profile','User')
                                    ->get();
            $themeusers=array();
        foreach($utilisateurs as $k=>$v){
            $themeusers[$v->id]=DB::table('user_themes')
                                ->join('themes','themes.id','=','user_themes.theme_id')
                                ->where('user_id',$v->id)
                                ->pluck('themes.name');
        }
            $fail="Erreur! Réessayer la Modification";
            return view('Suser.Utilisateurs',compact('utilisateurs','themeusers','fail'));
        }    
        
    }
    public function add(Request $request){
        $rules = [
            /* 'Nomentreprise' => 'required|string|max:25', */
            'Nom' => 'required|string|max:25',
            'Prenom' => 'required|string|max:25',
            'Email'=> 'required|email|string',
            'Tel'=> 'required|numeric',
            'cin'=> 'required|max:10',
            'theme'=>'required',
        ];
    
        $customMessages = [
            'required' => 'Le champ :attribute est requis.',
            'email' => "L'email est incorrect.",
            'numeric' => "Entrez un numero de telephone valide.",
            "string" => "Vous devez entrer une chaîne de caractére.",
        ];
        $request->validate($rules, $customMessages);
        $soc = DB::table('users')->where('id','=', session('LoggedSUser'))->first();
        $password=Str::random(10);
        $id_user=DB::table('users')->insertGetId(['last_name'=>$request->Nom,'email' => $request->Email,'first_name'=>$request->Prenom,'Tel'=>$request->Tel,'CIN'=>$request->cin,'username'=> $request->Nom,'username_canonical'=> $request->Nom,
         'email_canonical'=> $request->Email,'enabled'=>1,'password'=>Hash::make($password),'roles'=>'a:0:{}','profile'=>'User','society_id'=>$soc->society_id]);
        
        $insert=0;
        foreach($request->theme as $k=>$v){
            $insert+=DB::table('user_themes')->insert(['theme_id'=>$v,'user_id'=>$id_user]);
        }
       
        
        if( $id_user and ($insert==count($request->theme))){
            Notification::route('mail' , $request->Email)
            ->notify(new PasswordNotify($password));
  
            $satustrue=" Un Utilisateur est Ajouté";
            return view('Suser.Utilisateurs',compact('satustrue'));
        }
        else{

            $fail="Erreur! Réessayer l'Ajout";
            return view('Suser.Utilisateurs',compact('fail'));
        }    
        
    }
    public function delete(Request $request,$id){
        $delete_themes=DB::table('user_themes')->where('user_id',$id)->delete();
        $delete_users=DB::table('users')->where('id',$id)->delete();
        if( $delete_themes and $delete_users ){
            $satustrue="L'Utilisateur Choisi est Bien Supprimé";
            return view('Suser.Utilisateurs',compact('satustrue'));
        }
        else{
            
        }
            $fail="Erreur! Réessayer la Suppression";
            return view('Suser.Utilisateurs',compact('utilisateurs','themeusers','fail'));
        }   

        public function env()
         {
        $activity=DB::table('users_activities')->where('user_id',session('LoggedSUser'))->pluck('activity_id'); 
        $texts=DB::table('text')->where('theme_id',1)->whereIn('activity_id', $activity)->get();
        $soc = DB::table('users')->where('id','=', session('LoggedSUser'))->value('society_id');
        $conforme=1;
        $lesconformes=0;
        $lesnonconformes=0;
        $lesexpires=0;
        $lesnonexpires=0;
        $date_now = date("Y-m-d");
        foreach($texts as $text){
            $isconform=DB::table('rules_conformite')->where('text_id',$text->id)->where('society_id',$soc)->pluck('isConforme','rule_id');
            if(in_array('0', json_decode(json_encode($isconform), true))){
                $conforme=0;
            }
            $lesexpires+=DB::table('plan')->where('text_id',$text->id)->where('society_id',$soc)->where('accompli',0)->where('date',"<",$date_now)->count();
            $lesnonexpires+=DB::table('plan')->where('text_id',$text->id)->where('society_id',$soc)->where('accompli',0)->where('date',">=",$date_now)->count();
            $lesconformes+= DB::table('rules_conformite')->where('text_id',$text->id)->where('society_id',$soc)->where('isConforme',1)->count();
            $lesnonconformes+= DB::table('rules_conformite')->where('text_id',$text->id)->where('society_id',$soc)->where('isConforme',0)->count();
           
            $text->conformite=$conforme; 
        }
        $total=$lesconformes+$lesnonconformes;
        $expiration=$lesexpires+$lesnonexpires;
          
        
        return view('Suser.texts',['texts'=>$texts,'theme_id'=>3,'lesconformes'=>$lesconformes,'lesnonconformes'=>$lesnonconformes, 'total'=>$total,'lesexpires'=>$lesexpires,'lesnonexpires'=>$lesnonexpires,'expiration'=>$expiration]);
    }
    public function hsst()
    {
        
        $activity=DB::table('users_activities')->where('user_id',session('LoggedSUser'))->pluck('activity_id');
        $texts=DB::table('text')->where('theme_id',2)->whereIn('activity_id', $activity)->get();
        $soc = DB::table('users')->where('id','=', session('LoggedSUser'))->value('society_id');
        $conforme=1;
        $lesconformes=0;
        $lesnonconformes=0;
        $lesexpires=0;
        $lesnonexpires=0;
        $date_now = date("Y-m-d");
        foreach($texts as $text){
            $isconform=DB::table('rules_conformite')->where('text_id',$text->id)->where('society_id',$soc)->pluck('isConforme','rule_id');
            if(in_array('0', json_decode(json_encode($isconform), true))){
                $conforme=0;
            }
            $lesexpires+=DB::table('plan')->where('text_id',$text->id)->where('society_id',$soc)->where('accompli',0)->where('date',"<",$date_now)->count();
            $lesnonexpires+=DB::table('plan')->where('text_id',$text->id)->where('society_id',$soc)->where('accompli',0)->where('date',">=",$date_now)->count();
            $lesconformes+= DB::table('rules_conformite')->where('text_id',$text->id)->where('society_id',$soc)->where('isConforme',1)->count();
            $lesnonconformes+= DB::table('rules_conformite')->where('text_id',$text->id)->where('society_id',$soc)->where('isConforme',0)->count();
           
            $text->conformite=$conforme; 
        }
        $total=$lesconformes+$lesnonconformes;
        $expiration=$lesexpires+$lesnonexpires;
        return view('Suser.texts',['texts'=>$texts,'theme_id'=>3,'lesconformes'=>$lesconformes,'lesnonconformes'=>$lesnonconformes, 'total'=>$total,'lesexpires'=>$lesexpires,'lesnonexpires'=>$lesnonexpires,'expiration'=>$expiration]); return view('Suser.texts',['texts'=>$texts]);
    }
    public function eng()
    {
        $soc = DB::table('users')->where('id','=', session('LoggedSUser'))->value('society_id');
        $activity=DB::table('users_activities')->where('user_id',session('LoggedSUser'))->pluck('activity_id');
        $texts=DB::table('text')->where('theme_id',3)->whereIn('activity_id', $activity)->get();
        $lesconformes=0;
        $lesnonconformes=0;
        $lesexpires=0;
        $lesnonexpires=0;
        $date_now = date("Y-m-d");
        $conforme=1;
        foreach($texts as $text){
            $isconform=DB::table('rules_conformite')->where('text_id',$text->id)->where('society_id',$soc)->pluck('isConforme','rule_id');
            if(in_array('0', json_decode(json_encode($isconform), true))){
                $conforme=0;
            }
            $lesexpires+=DB::table('plan')->where('text_id',$text->id)->where('society_id',$soc)->where('accompli',0)->where('date',"<",$date_now)->count();
            $lesnonexpires+=DB::table('plan')->where('text_id',$text->id)->where('society_id',$soc)->where('accompli',0)->where('date',">=",$date_now)->count();
            $lesconformes+= DB::table('rules_conformite')->where('text_id',$text->id)->where('society_id',$soc)->where('isConforme',1)->count();
            $lesnonconformes+= DB::table('rules_conformite')->where('text_id',$text->id)->where('society_id',$soc)->where('isConforme',0)->count();

            
            $text->conformite=$conforme; 
        }
        $total=$lesconformes+$lesnonconformes;
        $expiration=$lesexpires+$lesnonexpires;
       
       

        return view('Suser.texts',['texts'=>$texts,'theme_id'=>3,'lesconformes'=>$lesconformes,'lesnonconformes'=>$lesnonconformes, 'total'=>$total,'lesexpires'=>$lesexpires,'lesnonexpires'=>$lesnonexpires,'expiration'=>$expiration]);
    }
    public function qlt()
    {
        $activity=DB::table('users_activities')->where('user_id',session('LoggedSUser'))->pluck('activity_id');
        $texts=DB::table('text')->where('theme_id',4)->whereIn('activity_id', $activity)->get();
        $soc = DB::table('users')->where('id','=', session('LoggedSUser'))->value('society_id');
        $conforme=1;
        $lesconformes=0;
        $lesnonconformes=0;
        $lesexpires=0;
        $lesnonexpires=0;
        $date_now = date("Y-m-d");
        foreach($texts as $text){
            $isconform=DB::table('rules_conformite')->where('text_id',$text->id)->where('society_id',$soc)->pluck('isConforme','rule_id');
            if(in_array('0', json_decode(json_encode($isconform), true))){
                $conforme=0;
            }
            $lesexpires+=DB::table('plan')->where('text_id',$text->id)->where('society_id',$soc)->where('accompli',0)->where('date',"<",$date_now)->count();
            $lesnonexpires+=DB::table('plan')->where('text_id',$text->id)->where('society_id',$soc)->where('accompli',0)->where('date',">=",$date_now)->count();
            $lesconformes+= DB::table('rules_conformite')->where('text_id',$text->id)->where('society_id',$soc)->where('isConforme',1)->count();
            $lesnonconformes+= DB::table('rules_conformite')->where('text_id',$text->id)->where('society_id',$soc)->where('isConforme',0)->count();
           
            $text->conformite=$conforme; 
        }
        $total=$lesconformes+$lesnonconformes;
        $expiration=$lesexpires+$lesnonexpires;
       
        return view('Suser.texts',['texts'=>$texts,'theme_id'=>3,'lesconformes'=>$lesconformes,'lesnonconformes'=>$lesnonconformes, 'total'=>$total,'lesexpires'=>$lesexpires,'lesnonexpires'=>$lesnonexpires,'expiration'=>$expiration]);
    }
    public function fnc()
    {
        $activity=DB::table('users_activities')->where('user_id',session('LoggedSUser'))->pluck('activity_id');
        $texts=DB::table('text')->where('theme_id',5)->whereIn('activity_id', $activity)->get();
        $soc = DB::table('users')->where('id','=', session('LoggedSUser'))->value('society_id');
        $conforme=1;
        $lesconformes=0;
        $lesnonconformes=0;
        $lesexpires=0;
        $lesnonexpires=0;
        $date_now = date("Y-m-d");
        foreach($texts as $text){
            $isconform=DB::table('rules_conformite')->where('text_id',$text->id)->where('society_id',$soc)->pluck('isConforme','rule_id');
           
            
            if(in_array('0', json_decode(json_encode($isconform), true))){
                $conforme=0;
            }
            $lesexpires+=DB::table('plan')->where('text_id',$text->id)->where('society_id',$soc)->where('accompli',0)->where('date',"<",$date_now)->count();
            $lesnonexpires+=DB::table('plan')->where('text_id',$text->id)->where('society_id',$soc)->where('accompli',0)->where('date',">=",$date_now)->count();
            $lesconformes+= DB::table('rules_conformite')->where('text_id',$text->id)->where('society_id',$soc)->where('isConforme',1)->count();
            $lesnonconformes+= DB::table('rules_conformite')->where('text_id',$text->id)->where('society_id',$soc)->where('isConforme',0)->count();
           
            $text->conformite=$conforme; 
        }
        $total=$lesconformes+$lesnonconformes;
        $expiration=$lesexpires+$lesnonexpires;
       
        return view('Suser.texts',['texts'=>$texts,'theme_id'=>3,'lesconformes'=>$lesconformes,'lesnonconformes'=>$lesnonconformes, 'total'=>$total,'lesexpires'=>$lesexpires,'lesnonexpires'=>$lesnonexpires,'expiration'=>$expiration]);
    }
    public function fsq()
    {   
        $activity=DB::table('users_activities')->where('user_id',session('LoggedSUser'))->pluck('activity_id');
        $texts=DB::table('text')->where('theme_id',6)->whereIn('activity_id', $activity)->get();
        $soc = DB::table('users')->where('id','=', session('LoggedSUser'))->value('society_id');
        $lesconformes=0;
        $lesnonconformes=0;
        $lesexpires=0;
        $lesnonexpires=0;
        $date_now = date("Y-m-d");
        $conforme=1;
                 foreach($texts as $text){
                    $isconform=DB::table('rules_conformite')->where('text_id',$text->id)->where('society_id',$soc)->pluck('isConforme','rule_id');
                    if(in_array('0', json_decode(json_encode($isconform), true))){
                        $conforme=0;
                    }
                    $lesexpires+=DB::table('plan')->where('text_id',$text->id)->where('society_id',$soc)->where('accompli',0)->where('date',"<",$date_now)->count();
                    $lesnonexpires+=DB::table('plan')->where('text_id',$text->id)->where('society_id',$soc)->where('accompli',0)->where('date',">=",$date_now)->count();
                    $lesconformes+= DB::table('rules_conformite')->where('text_id',$text->id)->where('society_id',$soc)->where('isConforme',1)->count();
                    $lesnonconformes+= DB::table('rules_conformite')->where('text_id',$text->id)->where('society_id',$soc)->where('isConforme',0)->count();
                   
                    $text->conformite=$conforme; 
                }
                $total=$lesconformes+$lesnonconformes;
                $expiration=$lesexpires+$lesnonexpires;
               
                
                return view('Suser.texts',['texts'=>$texts,'theme_id'=>3,'lesconformes'=>$lesconformes,'lesnonconformes'=>$lesnonconformes, 'total'=>$total,'lesexpires'=>$lesexpires,'lesnonexpires'=>$lesnonexpires,'expiration'=>$expiration]);
    } 
    public function lois($id)
    {   
        $soc = DB::table('users')->where('id','=', session('LoggedSUser'))->value('society_id');
        $file_bo=DB::table('text')->join('bos','text.bo_id',"=",'bos.id')->where('text.id',$id)->value('bos.file');
   
        $articles=DB::table('article')->where('text_id',$id)->pluck('id','description');
        $rules=DB::table('rules')->whereIn('article_id',$articles)->pluck('content','article_id');
        $rules_id=DB::table('rules')->whereIn('article_id',$articles)->pluck('id','article_id');
        
        $category = DB::table('category')
            ->join('text', 'category.id', '=', 'text.category_id')
            ->where('text.id',$id)
            ->value('category.name');
           
        $name = DB::table('text')->where('text.id',$id)->value('name');
    
        $description = DB::table('text')->where('text.id',$id)->value('description');
        
        $definition= DB::table('definitions')->join('article','article.id',"=",'definitions.article_id')->where('article.text_id',$id)->pluck('definitions.content','definitions.article_id');
     
        $def_id=array();
        foreach ($definition as $key => $value) {
            array_push($def_id,$key);
        }
        
        $sanctions= DB::table('sanctions')->whereIn('article_id',$articles)->pluck('content','article_id');
        
        $sanc_id=array();
        foreach ($sanctions as $key => $value) {
            array_push($sanc_id,$key);
        }
        $rule_id_f=array();
        foreach ($rules as $key => $value) {
            array_push($rule_id_f,$key);
        }
    
            
        
        
        
        $status=DB::table('rules_conformite')->where('text_id',$id)->where('society_id',$soc)->pluck('isConforme','rule_id');
        
             
             
         
        return view('Suser.loi',['rules'=>$rules,'category'=>$category,'name'=>$name,'resume'=>$description,'sanctions'=>$sanctions,'definitions'=>$definition,'status'=>$status,'articles'=>$articles,'rule_id'=>$rules_id,'def_id'=>$def_id,'sanc_id'=>$sanc_id,'rule_id_f'=>$rule_id_f,'file_bo'=>$file_bo]);
    }
    public function conformite(Request $request){
       $arrayy=array();
       $array=array();
       $soc = DB::table('users')->where('id','=', session('LoggedSUser'))->value('society_id');
       
       foreach($request->request as $k=>$v){
             $arrayy[$k]=$v;
       }
       
       unset($arrayy["_token"]);
      
    $s=0;
    $text_id="";
    foreach($arrayy as $k=>$v){
        if($v=="1"){$s+=1;
        }
        $text_id=DB::table('rules')->where('id',$k)->value('text_id');
        $update=DB::table('rules_conformite')->updateOrInsert(['society_id'=> $soc,'rule_id'=> $k,'text_id'=> $text_id],['isConforme'=>$v]);
        $update_text=DB::table('text_plan')->updateOrInsert(['society_id'=>$soc,'text_id'=> $text_id],['plan'=>0]);

    }  
    
    $r=count($arrayy);
    if($s=="$r"){
        $update_text=DB::table('text_plan')->updateOrInsert(['society_id'=>$soc,'text_id'=> $text_id],['plan'=>2]); 
    }
    return redirect()->back()->with('etat','Votre évaluation est enregistrée');
    }
    public function envactionplan()
    {
       
        $soc = DB::table('users')->where('id','=', session('LoggedSUser'))->value('society_id');
        $activity=DB::table('users_activities')->where('user_id',session('LoggedSUser'))->pluck('activity_id');
        $texts=DB::table('text')->join('text_plan','text.id','=','text_plan.text_id')->where('text_plan.society_id',$soc)->where('text_plan.plan',0)->where('text.theme_id',1)->whereIn('text.activity_id', $activity)->pluck('text.description','text.id');
        
         $rules=array();
         $texts_plan_id=DB::table('text_plan')->where('plan',1)->where('society_id',$soc)->pluck('text_id');
    
         $texts_plan=DB::table('text')->join('plan','plan.text_id',"=",'text.id')->where('plan.society_id',$soc)->whereIn('text.activity_id', $activity)->whereIn('plan.text_id',$texts_plan_id )->where('text.theme_id',1)
         ->where('plan.accompli',0)
         ->select('plan.id','plan.content','plan.title','plan.status','plan.user_id','plan.type','plan.criticality','plan.date','plan.text_id','text.description','plan.plan_creator')
         ->get();
        
         for($i=0;$i<count($texts_plan);$i++){
            
             $user_first=DB::table('users')->where('id',$texts_plan[$i]->user_id)->value('first_name');
             $user_last=DB::table('users')->where('id',$texts_plan[$i]->user_id)->value('last_name');
             $creator_first=DB::table('users')->where('id',$texts_plan[$i]->plan_creator)->value('first_name');
             $creator_last=DB::table('users')->where('id',$texts_plan[$i]->plan_creator)->value('last_name');
             $texts_plan[$i]->user_first= $user_first;
             $texts_plan[$i]->user_last= $user_last;
             $texts_plan[$i]->creator_first= $creator_first;
             $texts_plan[$i]->creator_last= $creator_last;
            

         }
         
        
       
        $exigences=array();
        foreach($texts as $k=>$v){
            $exigences[$k]=DB::table('rules')->join('rules_conformite','rules.id',"=",'rules_conformite.rule_id')->where('rules_conformite.society_id',$soc)->where([['rules_conformite.text_id',"=",$k],['rules_conformite.isConforme',"=",0]])->pluck('rules.content');
         }
        
        $u=DB::table('users')->join('user_themes','users.id',"=","user_themes.user_id")->where('user_themes.theme_id',1)->where('users.society_id',$soc)->where('users.profile',"User")->select('users.last_name','users.first_name','users.id')->get();
         
        
        return view('Suser.actionplan',['texts'=>$texts,'exigences'=>$exigences,'usersth'=>$u,'texts_plan'=>$texts_plan,'theme_plan'=>1]);
    }
    public function hsstactionplan()
    {
        
        $soc = DB::table('users')->where('id','=', session('LoggedSUser'))->value('society_id');
        $activity=DB::table('users_activities')->where('user_id',session('LoggedSUser'))->pluck('activity_id');
        $texts=DB::table('text')->join('text_plan','text.id','=','text_plan.text_id')->where('text_plan.society_id',$soc)->where('text_plan.plan',0)->where('text.theme_id',2)->whereIn('text.activity_id', $activity)->pluck('text.description','text.id');
        
         $rules=array();
         $texts_plan_id=DB::table('text_plan')->where('plan',1)->where('society_id',$soc)->pluck('text_id');
    
         $texts_plan=DB::table('text')->join('plan','plan.text_id',"=",'text.id')->where('plan.society_id',$soc)->whereIn('text.activity_id', $activity)->whereIn('plan.text_id',$texts_plan_id )->where('text.theme_id',2)
         ->where('plan.accompli',0)
         ->select('plan.id','plan.content','plan.title','plan.status','plan.user_id','plan.type','plan.criticality','plan.date','plan.text_id','text.description','plan.plan_creator$texts_plan[$i]->plan_creator')
         ->get();
        
         for($i=0;$i<count($texts_plan);$i++){
            
             $user_first=DB::table('users')->where('id',$texts_plan[$i]->user_id)->value('first_name');
             $user_last=DB::table('users')->where('id',$texts_plan[$i]->user_id)->value('last_name');
             $creator_first=DB::table('users')->where('id',$texts_plan[$i]->plan_creator)->value('first_name');
             $creator_last=DB::table('users')->where('id',$texts_plan[$i]->plan_creator)->value('last_name');
             $texts_plan[$i]->user_first= $user_first;
             $texts_plan[$i]->user_last= $user_last;
             $texts_plan[$i]->creator_first= $creator_first;
             $texts_plan[$i]->creator_last= $creator_last;
            

         }
         
        
       
        $exigences=array();
        foreach($texts as $k=>$v){
            $exigences[$k]=DB::table('rules')->join('rules_conformite','rules.id',"=",'rules_conformite.rule_id')->where('rules_conformite.society_id',$soc)->where([['rules_conformite.text_id',"=",$k],['rules_conformite.isConforme',"=",0]])->pluck('rules.content');
         }
        
        $u=DB::table('users')->join('user_themes','users.id',"=","user_themes.user_id")->where('user_themes.theme_id',2)->where('users.society_id',$soc)->where('users.profile',"User")->select('users.last_name','users.first_name','users.id')->get();
         
        return view('Suser.actionplan',['texts'=>$texts,'exigences'=>$exigences,'usersth'=>$u,'texts_plan'=>$texts_plan,'theme_plan'=>2]);
    }
    public function engactionplan()
    {    
        $soc = DB::table('users')->where('id','=', session('LoggedSUser'))->value('society_id');
        $activity=DB::table('users_activities')->where('user_id',session('LoggedSUser'))->pluck('activity_id');
        $texts=DB::table('text')->join('text_plan','text.id','=','text_plan.text_id')->where('text_plan.society_id',$soc)->where('text_plan.plan',0)->where('text.theme_id',3)->whereIn('text.activity_id', $activity)->pluck('text.description','text.id');
        
         $rules=array();
         $texts_plan_id=DB::table('text_plan')->where('plan',1)->where('society_id',$soc)->pluck('text_id');
    
         $texts_plan=DB::table('text')->join('plan','plan.text_id',"=",'text.id')->where('plan.society_id',$soc)->whereIn('text.activity_id', $activity)->whereIn('plan.text_id',$texts_plan_id )->where('text.theme_id',3)
         ->where('plan.accompli',0)
         ->select('plan.id','plan.content','plan.title','plan.status','plan.user_id','plan.type','plan.criticality','plan.date','plan.text_id','text.description','plan.plan_creator','plan.text_id')
         ->get();
        
         for($i=0;$i<count($texts_plan);$i++){
            
             $user_first=DB::table('users')->where('id',$texts_plan[$i]->user_id)->value('first_name');
             $user_last=DB::table('users')->where('id',$texts_plan[$i]->user_id)->value('last_name');
             $creator_first=DB::table('users')->where('id',$texts_plan[$i]->plan_creator)->value('first_name');
             $creator_last=DB::table('users')->where('id',$texts_plan[$i]->plan_creator)->value('last_name');
             $texts_plan[$i]->user_first= $user_first;
             $texts_plan[$i]->user_last= $user_last;
             $texts_plan[$i]->creator_first= $creator_first;
             $texts_plan[$i]->creator_last= $creator_last;
            

         }
         
        
       
        $exigences=array();
        foreach($texts as $k=>$v){
            $exigences[$k]=DB::table('rules')->join('rules_conformite','rules.id',"=",'rules_conformite.rule_id')->where('rules_conformite.society_id',$soc)->where([['rules_conformite.text_id',"=",$k],['rules_conformite.isConforme',"=",0]])->pluck('rules.content');
         }
        
        $u=DB::table('users')->join('user_themes','users.id',"=","user_themes.user_id")->where('user_themes.theme_id',3)->where('users.society_id',$soc)->where('users.profile',"User")->select('users.last_name','users.first_name','users.id')->get();
         
        return view('Suser.actionplan',['texts'=>$texts,'exigences'=>$exigences,'usersth'=>$u,'texts_plan'=>$texts_plan,'theme_plan'=>3]);
    }
    public function qltactionplan()
    {
        $soc = DB::table('users')->where('id','=', session('LoggedSUser'))->value('society_id');
        $activity=DB::table('users_activities')->where('user_id',session('LoggedSUser'))->pluck('activity_id');
        $texts=DB::table('text')->join('text_plan','text.id','=','text_plan.text_id')->where('text_plan.society_id',$soc)->where('text_plan.plan',0)->where('text.theme_id',4)->whereIn('text.activity_id', $activity)->pluck('text.description','text.id');
        
         $rules=array();
         $texts_plan_id=DB::table('text_plan')->where('plan',1)->where('society_id',$soc)->pluck('text_id');
    
         $texts_plan=DB::table('text')->join('plan','plan.text_id',"=",'text.id')->where('plan.society_id',$soc)->whereIn('text.activity_id', $activity)->whereIn('plan.text_id',$texts_plan_id )->where('text.theme_id',4)
         ->where('plan.accompli',0)
         ->select('plan.id','plan.content','plan.title','plan.status','plan.user_id','plan.type','plan.criticality','plan.date','plan.text_id','text.description','plan.plan_creator')
         ->get();
        
         for($i=0;$i<count($texts_plan);$i++){
            
             $user_first=DB::table('users')->where('id',$texts_plan[$i]->user_id)->value('first_name');
             $user_last=DB::table('users')->where('id',$texts_plan[$i]->user_id)->value('last_name');
             $creator_first=DB::table('users')->where('id',$texts_plan[$i]->plan_creator)->value('first_name');
             $creator_last=DB::table('users')->where('id',$texts_plan[$i]->plan_creator)->value('last_name');
             $texts_plan[$i]->user_first= $user_first;
             $texts_plan[$i]->user_last= $user_last;
             $texts_plan[$i]->creator_first= $creator_first;
             $texts_plan[$i]->creator_last= $creator_last;
            

         }
         
        
       
        $exigences=array();
        foreach($texts as $k=>$v){
            $exigences[$k]=DB::table('rules')->join('rules_conformite','rules.id',"=",'rules_conformite.rule_id')->where('rules_conformite.society_id',$soc)->where([['rules_conformite.text_id',"=",$k],['rules_conformite.isConforme',"=",0]])->pluck('rules.content');
         }
        
        $u=DB::table('users')->join('user_themes','users.id',"=","user_themes.user_id")->where('user_themes.theme_id',4)->where('users.society_id',$soc)->where('users.profile',"User")->select('users.last_name','users.first_name','users.id')->get();
         
        return view('Suser.actionplan',['texts'=>$texts,'exigences'=>$exigences,'usersth'=>$u,'texts_plan'=>$texts_plan,'theme_plan'=>4]);
    }
    public function fncactionplan()
    {
        
        $soc = DB::table('users')->where('id','=', session('LoggedSUser'))->value('society_id');
        $activity=DB::table('users_activities')->where('user_id',session('LoggedSUser'))->pluck('activity_id');
        $texts=DB::table('text')->join('text_plan','text.id','=','text_plan.text_id')->where('text_plan.society_id',$soc)->where('text_plan.plan',0)->where('text.theme_id',5)->whereIn('text.activity_id', $activity)->pluck('text.description','text.id');
        
         $rules=array();
         $texts_plan_id=DB::table('text_plan')->where('plan',1)->where('society_id',$soc)->pluck('text_id');
    
         $texts_plan=DB::table('text')->join('plan','plan.text_id',"=",'text.id')->where('plan.society_id',$soc)->whereIn('text.activity_id', $activity)->whereIn('plan.text_id',$texts_plan_id )->where('text.theme_id',5)
         ->where('plan.accompli',0)
         ->select('plan.id','plan.content','plan.title','plan.status','plan.user_id','plan.type','plan.criticality','plan.date','plan.text_id','text.description','plan.plan_creator')
         ->get();
        
         for($i=0;$i<count($texts_plan);$i++){
            
             $user_first=DB::table('users')->where('id',$texts_plan[$i]->user_id)->value('first_name');
             $user_last=DB::table('users')->where('id',$texts_plan[$i]->user_id)->value('last_name');
             $creator_first=DB::table('users')->where('id',$texts_plan[$i]->plan_creator)->value('first_name');
             $creator_last=DB::table('users')->where('id',$texts_plan[$i]->plan_creator)->value('last_name');
             $texts_plan[$i]->user_first= $user_first;
             $texts_plan[$i]->user_last= $user_last;
             $texts_plan[$i]->creator_first= $creator_first;
             $texts_plan[$i]->creator_last= $creator_last;
            

         }
         
        
       
        $exigences=array();
        foreach($texts as $k=>$v){
            $exigences[$k]=DB::table('rules')->join('rules_conformite','rules.id',"=",'rules_conformite.rule_id')->where('rules_conformite.society_id',$soc)->where([['rules_conformite.text_id',"=",$k],['rules_conformite.isConforme',"=",0]])->pluck('rules.content');
         }
        
        $u=DB::table('users')->join('user_themes','users.id',"=","user_themes.user_id")->where('user_themes.theme_id',5)->where('users.society_id',$soc)->where('users.profile',"User")->select('users.last_name','users.first_name','users.id')->get();
         
        return view('Suser.actionplan',['texts'=>$texts,'exigences'=>$exigences,'usersth'=>$u,'texts_plan'=>$texts_plan,'theme_plan'=>5]);
    }
    public function fsqactionplan()
    {   
        $soc = DB::table('users')->where('id','=', session('LoggedSUser'))->value('society_id');
        $activity=DB::table('users_activities')->where('user_id',session('LoggedSUser'))->pluck('activity_id');
        $texts=DB::table('text')->join('text_plan','text.id','=','text_plan.text_id')->where('text_plan.society_id',$soc)->where('text_plan.plan',0)->where('text.theme_id',6)->whereIn('text.activity_id', $activity)->pluck('text.description','text.id');
        
         $rules=array();
         $texts_plan_id=DB::table('text_plan')->where('plan',1)->where('society_id',$soc)->pluck('text_id');
    
         $texts_plan=DB::table('text')->join('plan','plan.text_id',"=",'text.id')->where('plan.society_id',$soc)->whereIn('text.activity_id', $activity)->whereIn('plan.text_id',$texts_plan_id )->where('text.theme_id',6)
         ->where('plan.accompli',0)
         ->select('plan.id','plan.content','plan.title','plan.status','plan.user_id','plan.type','plan.criticality','plan.date','plan.text_id','text.description','plan.plan_creator')
         ->get();
        
         for($i=0;$i<count($texts_plan);$i++){
            
             $user_first=DB::table('users')->where('id',$texts_plan[$i]->user_id)->value('first_name');
             $user_last=DB::table('users')->where('id',$texts_plan[$i]->user_id)->value('last_name');
             $creator_first=DB::table('users')->where('id',$texts_plan[$i]->plan_creator)->value('first_name');
             $creator_last=DB::table('users')->where('id',$texts_plan[$i]->plan_creator)->value('last_name');
             $texts_plan[$i]->user_first= $user_first;
             $texts_plan[$i]->user_last= $user_last;
             $texts_plan[$i]->creator_first= $creator_first;
             $texts_plan[$i]->creator_last= $creator_last;
            

         }
         
        
       
        $exigences=array();
        foreach($texts as $k=>$v){
            $exigences[$k]=DB::table('rules')->join('rules_conformite','rules.id',"=",'rules_conformite.rule_id')->where('rules_conformite.society_id',$soc)->where([['rules_conformite.text_id',"=",$k],['rules_conformite.isConforme',"=",0]])->pluck('rules.content');
         }
        
        $u=DB::table('users')->join('user_themes','users.id',"=","user_themes.user_id")->where('user_themes.theme_id',6)->where('users.society_id',$soc)->where('users.profile',"User")->select('users.last_name','users.first_name','users.id')->get();
         
        return view('Suser.actionplan',['texts'=>$texts,'exigences'=>$exigences,'usersth'=>$u,'texts_plan'=>$texts_plan,'theme_plan'=>6]);
    } 
    public function actionplan(Request $request,$text_id){
        $rules = [
            /* 'Nomentreprise' => 'required|string|max:25', */
            'title' => 'required|string|max:30',
            'description' => 'required|string',
            'type'=> 'required',
            'statut'=> 'required',
            'criticity'=> 'required',
            'user'=> 'required',
            'date'=>'required|after:yesterday'
        ];
    
        $customMessages = [
            'required' => 'le champ :attribute est requis.',
            "string" => "vous devez entrer une chaîne de caractére.",
           
        ];
        $request->validate($rules, $customMessages);
        $soc = DB::table('users')->where('id','=', session('LoggedSUser'))->value('society_id');

        $insert_plan=DB::table('plan')->insert([
            'title' => $request->title,
            'content' => $request->description,
            'user_id' => $request->user,
            'text_id' => $text_id,
            'plan_creator' => session('LoggedSUser'),
            'type' => $request->type,
            'status' => $request->statut,
            'criticality' => $request->criticity,
            'date' => $request->date,
            'society_id' => $soc,
        ]);
        $insert_text=DB::table('text_plan')->where('text_id',$text_id)->where('society_id',$soc)->update([
            'plan' => 1]);
        if($insert_plan and  $insert_text and $request->user!=session('LoggedSUser')){
            $email=DB::table('users')->where('id',$request->user)->value('email');
            Notification::route('mail' , $email)
            ->notify(new AssignNotify($request->title));
        }
        
        $plan_infos=array('title'=>$request->title,'content' => $request->description,'type' => $request->type,
        'status' => $request->statut,'criticality' => $request->criticity,'date' => $request->date);
    
        
       return redirect()->back()->with('etat','enregistrement reussi');;
    }
    public function deleteplan(Request $request,$id)
    {    $text_id=DB::table('plan')->where('id',$id)->get('text_id');
        $soc = DB::table('users')->where('id','=', session('LoggedSUser'))->value('society_id');
        DB::table('text_plan')->where('text_id', $text_id[0]->text_id)->where('society_id',$soc)->update(['plan'=>0]);
        $deleted=DB::table('plan')->where('id',$id)->delete();
        
        if($deleted){
            return redirect()->back()->with('dsuccess','Le plan selectionné est supprimé');
        }else{
            return redirect()->back()->with('dfail','Erreur! Réessayer la Suppression');
        }
    }
    public function updateplan(Request $request,$id)
    {
        $rules = [
            /* 'Nomentreprise' => 'required|string|max:25', */
            'title' => 'required|string|max:30',
            'description' => 'required|string',
            'type'=> 'required',
            'statut'=> 'required',
            'criticity'=> 'required',
            'user'=> 'required',
           /*  'date'=>'required|after:yesterday' */
        ];
    
        $customMessages = [
            'required' => 'le champ :attribute est requis.',
            "string" => "vous devez entrer une chaîne de caractére.",
           
        ];
        $request->validate($rules, $customMessages);

        $updated=DB::table('plan')->where('id',$id)->update(['title'=>$request->title,
        'content' => $request->description,'type'=>$request->type,'status'=>$request->statut,
        'criticality'=>$request->criticity, 'date'=>$request->date,'user_id'=>$request->user]);
        
        if($updated){
            if($request->user!=session('LoggedSUser')){
            $email=DB::table('users')->where('id',$request->user)->value('email');
            Notification::route('mail' , $email)
            ->notify(new AssignNotify($request->title));}
            return redirect()->back()->with('dsuccess','Le plan selectionné est modifié.');
        }else{
            return redirect()->back()->with('dfail','Erreur! Réessayer la modification');
        }
    }
    public function updateplanpage(Request $request,$id,$theme_plan)
    {
        
        $soc = DB::table('users')->where('id','=', session('LoggedSUser'))->value('society_id');
        $u=DB::table('users')->join('user_themes','users.id',"=","user_themes.user_id")->where('user_themes.theme_id',$theme_plan)->where('users.society_id',$soc)->where('users.profile',"User")->select('users.last_name','users.first_name','users.id')->get();
        $text_id=DB::table('plan')->where('id',$id)->where('society_id',$soc)->where('plan_creator',session('LoggedSUser'))->value('text_id');
        $exigences=DB::table('rules')->join('rules_conformite','rules.id',"=",'rules_conformite.rule_id')->where('rules_conformite.society_id',$soc)->where([['rules.text_id',"=",$text_id],['rules_conformite.isConforme',"=",0]])->pluck('content');
        $updateinfo=DB::table('plan')->select('title', 'content', 'type', 'status', 'criticality', 'date')->find($id);
        return view('Suser.updateplane',['updateinfo'=>$updateinfo,'exigences'=>$exigences,'usersth'=>$u,'id'=>$id]);
    }
    public function actionplanaccompli($plan_id){
        $soc = DB::table('users')->where('id','=', session('LoggedSUser'))->value('society_id');
        $text_id=DB::table('plan')->where('id',$plan_id)->value('text_id');
        $confirme=DB::table('rules_conformite')->where('text_id',$text_id)->where('society_id',$soc)->pluck('isConforme','id');
        foreach ($confirme as $key => $value) {
            DB::table('rules_conformite')->where('id',$key)->update(['isConforme'=>1]);
        }
       
        $deleted=DB::table('plan')->where('id',$plan_id)->update(['accompli'=>1]);
        return redirect()->back();
    }

        
    }


