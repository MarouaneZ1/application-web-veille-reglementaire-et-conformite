<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class formcontroller extends Controller
{
    //
    public function form(){
        $regions=DB::table('region')->pluck('name');
        
        return view('forms.formstep1',['regions'=>$regions]); 
    }
    public function selectsection(Request $request){
        $sections = DB::table('section')->pluck('name','id'); 
        return view('forms.formstep2',['status' => 'vous avez reussis la première étape','titles'=>$sections]);
    }

    public function adduserpost(Request $request){
    
            $rules = [
                'Nomentreprise' => 'unique:societies,name|required|string|max:25',
                'ice' => 'unique:societies,ICE|required|string|max:15',
                'idf' => 'unique:societies,IDF|required|string|max:20',
                'rc' => 'unique:societies,RC|required|string|max:20',
                'cnss' => 'unique:societies,CNSS|required|string|max:20',
                'Fax' => 'required|string|max:25',
                'Email'=> 'required|email|string',
                'Tel'=> 'required|max:15',
                'Npatente'=>'unique:societies,patente|required|numeric',
                'Adresse_entreprise'=>'required',
                'Nom_Contact'=>'required',
                'region'=>'required',
                'Telephone_du_Contact'=>'required|max:15',
                'Nom' => 'required|string|max:25',
                'Prenom' => 'required|string|max:25',
                'Email'=> 'required|email|string|unique:users',
                'Telephone'=> 'required|max:15',
                'Motdepasse'=> 'required|min:8|string|confirmed',
                'Motdepasse_confirmation'=> 'required',
                'cin'=>'unique:users,CIN|required|max:8'
            ];
        
            $customMessages = [
                'required' => 'Le champ :attribute est requis.',
                'email' => "L'email est incorrect.",
                'confirmed' => "Le mot de passe retaper ne correspond pas.", 
                'min' => "Le mot de passe doit avoir au minimum 8 charactères",
                'numeric' => "Entrez un numero.",
                "string" => "Vous devez entrer une chaîne de caractére.",
                "unique" => ":attribute existe deja.",
                'max'=>'Le champ :attribute doit contenir 8 caractéres au max.'
            ];
            $attr = [
                'Nomentreprise' => 'Nom entreprise',
                'Email_contact'=> 'Email contact',
                'Adresse_entreprise'=> 'Adresse entreprise',
                'Npatente'=>'N° Patente',
                'Tel'=>'Téléphone',
                'Motdepasse'=> 'mot de passe',
                'Motdepasse_confirmation'=> 'confirmation du mot de passe',
                'Npatente'=>'N° Patente',
                'cin'=>'CIN',
                'ice'=>'ICE',
                'idf'=>'IF',
                'rc'=>'RC',
                'cnss'=>'CNSS'

                
            ];
            $request->validate($rules, $customMessages,$attr);
            
            $varb=array(
                'Nom'=>$request->Nom,
                'Prenom'=>$request->Prenom,
                'Email'=> $request->Email,
                'Telephone'=> $request->Telephone,
                'Motdepasse'=> Hash::make($request->Motdepasse),
                'cin'=>$request->cin,
                'Npatente'=>$request->Npatente,'Nomentreprise'=>$request->Nomentreprise,'ICE'=>$request->ice,'RC'=>$request->rc,'IDF'=>$request->idf,'CNSS'=>$request->cnss,'Fax'=>$request->Fax,'Email_contact'=>$request->Email_contact,'Tel'=> $request->Tel,
                'Npatente'=>$request->Npatente, 'Adresse_entreprise'=>$request->Adresse_entreprise,'Telephone_du_Contact'=>$request->Telephone_du_Contact,
                'Nom_Contact'=>$request->Nom_Contact,'CIN'=>$request->cin,'region'=>$request->region
            );
            

        $request->validate($rules, $customMessages,$attr);
        $request->session()->put('var',$varb);
        $sections = DB::table('section')->pluck('name','id'); 
        return view('forms.formstep2',['status' => 'vous avez reussis la première étape','titles'=>$sections]);
         
        }
  
/*     public function select(Request $request){
        $titles = DB::table('section')->pluck('name','id'); 
        return view('forms.formstep2',['status' => 'vous avez reussis la première étape','titles'=>$titles,'title'=>'Step1']); 
    } */
    public function selectbranche(Request $request){
        $r=array();
            $v=array();
            $varb=$request->session()->get('var');
          
            foreach ( $varb['section'] as $key => $value) {
                $branche = DB::table('n1_activities')->where('section_id', $value)->pluck('name', 'id');
                $r[$value]=$branche;
                $section_name = DB::table('section')->where('id', $value)->pluck('name', 'id');
                array_push($v,$section_name);
            }
        return view('forms.formstep3',['status' => 'choissisez une branche','banches'=>$r,'names'=>$v]);
       
    }
    public function selectbranchepost(Request $request){
       
            $rules = [
                'section'=> "required|min:1"
            ];
            $customMessages = [
                'required' => 'Vous devez choisir une section.'
            ];
            $request->validate($rules, $customMessages);
            $varb=$request->session()->get('var');
            $varb['section']=$request->section;
            $request->session()->put('var',$varb);
            $r=array();
            $v=array();
            foreach ( $request->section as $key => $value) {
                $branche = DB::table('n1_activities')->where('section_id', $value)->pluck('name', 'id');
                $r[$value]=$branche;
                $section_name = DB::table('section')->where('id', $value)->pluck('name', 'id');
                array_push($v,$section_name);
            }
        return view('forms.formstep3',['status' => 'choissisez une branche','banches'=>$r,'names'=>$v]);
    }
    public function selectsousbranche(Request $request){
        $r=array();
        $v=array();
        $varb=$request->session()->get('var');
        foreach ( $varb['branche'] as $key => $value) {
            $sousbranche = DB::table('n2_activities')->where('n1_activity_id', $value)->pluck('name', 'id');
            $r[$value]=$sousbranche;
            $branche_name = DB::table('n1_activities')->where('id', $value)->pluck('name', 'id');
            array_push($v,$branche_name);
        }
/*         $varb=$request->session()->get('var');
        $varb['branche']=$request->branche;
        $request->session()->put('var',$varb); */
        return view('forms.formstep4',['status' => 'choissisez une sous-branche','banches'=>$r,'names'=>$v]);
    }

    public function selectsousbranchepost(Request $request){
        
         $rules = [
            'branche' => 'required|min:1',
        ];
    
        $customMessages = [
            'required' => 'Vous devez choisir une branche.',
        ];
        $request->validate($rules, $customMessages);
        $r=array();
        $v=array();
        foreach ( $request->branche as $key => $value) {
            $sousbranche = DB::table('n2_activities')->where('n1_activity_id', $value)->pluck('name', 'id');
            $r[$value]=$sousbranche;
            $branche_name = DB::table('n1_activities')->where('id', $value)->pluck('name', 'id');
            array_push($v,$branche_name);
        }
        $varb=$request->session()->get('var');
        $varb['branche']=$request->branche;
        $request->session()->put('var',$varb);
        return view('forms.formstep4',['status' => 'choissisez une sous-branche','banches'=>$r,'names'=>$v]);
    }
    public function selectactivite(Request $request){
        $r=array();
        $v=array();
        $varb=$request->session()->get('var');
        foreach ( $varb['sousbranche'] as $key => $value) {
            $sousbranche = DB::table('activity')->where('n2_activity_id', $value)->pluck('name', 'id');
            $r[$value]=$sousbranche;
            $branche_name = DB::table('n2_activities')->where('id', $value)->pluck('name', 'id');
            array_push($v,$branche_name);
        }

        
        $activities = DB::table('activity')->where('n2_activity_id', $request->sousbranche)->pluck('name', 'id');
        return view('forms.formstep5',['status' => 'choissisez une activité','banches'=>$r,'names'=>$v]);

    }
    public function selectactivitepost(Request $request){
        $rules = [
            'sousbranche' => 'required|min:1',
        ];
    
        $customMessages = [
            'required' => 'Vous devez choisir une sous-branche.',
        ];
        $request->validate($rules, $customMessages);
        $r=array();
        $v=array();
        foreach ( $request->sousbranche as $key => $value) {
            $sousbranche = DB::table('activity')->where('n2_activity_id', $value)->pluck('name', 'id');
            $r[$value]=$sousbranche;
            $branche_name = DB::table('n2_activities')->where('id', $value)->pluck('name', 'id');
            array_push($v,$branche_name);
        }
        $varb=$request->session()->get('var');
        $varb['sousbranche']=$request->sousbranche;
        $request->session()->put('var',$varb);
        
        $activities = DB::table('activity')->where('n2_activity_id', $request->sousbranche)->pluck('name', 'id');
        return view('forms.formstep5',['status' => 'choissisez une activité','banches'=>$r,'names'=>$v]);
    }
    public function theme(Request $request){
        $themes = DB::table('themes')->pluck('name','id'); 
        return view('forms.formstep6',['status' => 'vous avez reussis la dernière étape.','titles'=>$themes]);
    }


    public function themepost(Request $request){
        $rules = [
            'activite' => 'required',
        ];
    
        $customMessages = [
            'required' => 'Vous devez choisir une activité.',
        ];
        $request->validate($rules, $customMessages);
        $varb=$request->session()->get('var');
        $varb['activity']=$request->activite;
        $request->session()->put('var',$varb);
        $themes = DB::table('themes')->pluck('name','id'); 
        return view('forms.formstep6',['status' => 'vous avez reussis la dernière étape.','titles'=>$themes]);
    }
   /*  public function offer(Request $request){
        return view('forms.formstep7',['status' => 'Passons au Paiement!']);
    }
    public function offerpost(Request $request){
        $rules = [
            'theme' => 'required',
        ];
    
        $customMessages = [
            'required' => 'Vous devez choisir un thème.',
        ];

        $request->validate($rules, $customMessages);

        $varb=$request->session()->get('var');
        $varb['themes']=$request->theme;
        $request->session()->put('var',$varb);
        return view('forms.formstep7',['status' => 'Passons au Paiement!']);
       
    } */

    public function insertpost(Request $request){
        $rules = [
            'theme' => 'required',
        ];
    
        $customMessages = [
            'required' => 'Vous devez choisir un thème.',
        ];

        $request->validate($rules, $customMessages);

        $varb=$request->session()->get('var');
        $varb['themes']=$request->theme;
        $request->session()->put('var',$varb);
        $info=$request->session()->get('var');
        $region_id=DB::table('region')->where('name',$info['region'])->value('id'); 
        
            DB::table('societies')->insert([
            'name'=>$info['Nomentreprise'],
            'adresse'=>$info['Adresse_entreprise'],
            'tel'=>$info['Tel'],
            'fax'=>$info['Fax'],
            'contact_name'=>$info['Nom_Contact'],
            'contact_tel'=>$info['Telephone_du_Contact'],
            'contact_mail'=>$info['Email_contact'],
            'patente'=>$info['Npatente'],
            'ICE'=>$info['ICE'],
            'RC'=>$info['RC'],
            'IDF'=>$info['IDF'],
            'CNSS'=>$info['CNSS'],
            'region_id'=> $region_id
           
        ]);
    
       $id = DB::table('societies')->where('ICE', $info['ICE'])->value('id');
        $id_user=DB::table('users')->insertGetId([
            'email' => $info['Email'],
            'first_name'=> $info['Prenom'],
            'last_name' => $info['Nom'],
            'username'=> $info['Nom'],
            'username_canonical'=> $info['Nom'],
            'email_canonical'=> $info['Email'],
            'enabled'=>1,
            'password'=>$info['Motdepasse'],
            'roles'=>'a:0:{}',
            'profile'=>'SUser',
            'society_id'=>$id,
            'Tel'=>$info['Telephone'],
            'CIN'=>$info['CIN']
        ]);
        foreach($info['activity'] as $k =>$v){
        DB::table('users_activities')->insert([
            'user_id'=>$id_user,
            'activity_id'=>$v
        ]);}
        foreach($info['themes'] as $k =>$v){
            DB::table('user_themes')->insert([
                'user_id'=>$id_user,
                'theme_id'=>$v
            ]);}
        session()->pull('var');
        return redirect('/sauthentifier');
    }
}

