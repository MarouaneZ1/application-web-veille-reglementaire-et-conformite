<?php

namespace App\Http\Controllers;
use App\Models\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Territoire extends Controller
{
    //
    public function region(){
            $regions = DB::table('region')->select('id','name','zone')->get();
            $data = ['LoggedUserInfo'=>users::where('id','=', session('LoggedUser'))->first()];
        return view('user_dashboard.territoires.region',['regions'=>$regions],$data); 
    }
    public function add_region(Request $request){
        $rules = [
            'Nom' => 'required|string|max:25',
            'zone' => 'required|string|max:25'
        ];
    
        $customMessages = [
            'required' => 'le champ :attribute est requis.',
            'email' => "l'email est incorrect.",
            'numeric' => "le numero de telephone n'est pas un numérique.",
            "string" => "vous devez entrer une chaîne de caractére.",
            "unique" => "l'email existe deja."
        ];

       
        /* $this->validate($request, $rules, $customMessages); */
        $request->validateWithBag('adduser',$rules, $customMessages);
        if(DB::table('region')->insert([
         'name' => $request->Nom,
         'zone'=> $request->zone,
         ]))
        return redirect('/dashboard/territoire/region')->with('dsuccess',"l'ajout a été éffectué avec succès");
        return redirect('/dashboard/territoire/region')->with('dfail',"il y a un problème lors de l'enregistrement ! veuillez réessayer...");
    }
    public function delete_region(Request $request,$id){
        if(DB::table('region')->where('id',$id)->delete())
        return redirect('/dashboard/territoire/region')->with('dsuccess',"la suppression a été effectuée");
        return redirect('/dashboard/territoire/region')->with('dfail',"un problème est survenu lors de la suppression,veuillez réessayer...");
    }

    public function update_region(Request $request){
        $rules = [
           /* 'Nomentreprise' => 'required|string|max:25', */
           'Nomu' => 'required|string|max:25',
           'zoneu' => 'required|string|max:25',
       ];
   
       $customMessages = [
           'required' => 'le champ :attribute est requis.',
           'email' => "l'email est incorrect.",
           'numeric' => "le numero de telephone n'est pas un numérique.",
           "string" => "vous devez entrer une chaîne de caractére.",
           "unique" => "l'email existe deja."
       ];
       $attributes = [
        'Nomu' => 'Nom',
        'zoneu' => 'Zone'
    ];
   
       /* $this->validate($request, $rules, $customMessages); */
       $request->validateWithBag('updateuser',$rules, $customMessages,$attributes);
       if(DB::table('region')
              ->where('id',$request->id)
              ->update(['name'=>$request->Nomu,'zone' => $request->zoneu]))
       return redirect('/dashboard/territoire/region')->with('dsuccess',"la modification a été effectuée");
       return redirect('/dashboard/territoire/region')->with('dfail',"un problème est survenu lors de la modification,veuillez réessayer...");
    }
 public function prefecture(){
            $prefectures = DB::table('prefecture')->select('id','region_id','name')->get(); 
            $data = ['LoggedUserInfo'=>users::where('id','=', session('LoggedUser'))->first()];
        return view('user_dashboard.territoires.prefecture',['prefectures'=>$prefectures],$data); 
    }
    public function delete_prefecture(Request $request,$id){
        if(DB::table('prefecture')->where('id',$id)->delete())
        return redirect('/dashboard/territoire/prefecture')->with('dsuccess',"la suppression a été effectuée");
        return redirect('/dashboard/territoire/prefecture')->with('dfail',"un problème est survenu lors de la suppression,veuillez réessayer...");
    }
            
public function update_prefecture(Request $request){
        $rules = [
           /* 'Nomentreprise' => 'required|string|max:25', */
           'Nregionu' => 'required|string|max:25',
           'Nomu' => 'required|string|max:25',
       ];
   
       $customMessages = [
           'required' => 'le champ :attribute est requis.',
           'email' => "l'email est incorrect.",
           'numeric' => "le numero de telephone n'est pas un numérique.",
           "string" => "vous devez entrer une chaîne de caractére.",
           "unique" => "l'email existe deja."
       ];
       $attributes = [
        'Nregionu' => 'N Région',
        'Nomu' => 'Nom',
    ];
       /* $this->validate($request, $rules, $customMessages); */
       $request->validateWithBag('updateuser',$rules, $customMessages,$attributes);
       if(DB::table('prefecture')
              ->where('id', $request->id)
              ->update(['region_id'=>$request->Nregionu,'name' => $request->Nomu]))
       return redirect('/dashboard/territoire/prefecture')->with('dsuccess',"la modification a été effectuée");
       return redirect('/dashboard/territoire/prefecture')->with('dfail',"un problème est survenu lors de la modification,veuillez réessayer...");
    }

    public function add_prefecture(Request $request){
        $rules = [
            /* 'Nomentreprise' => 'required|string|max:25', */
            'Nom' => 'required|string|max:25',
            'Nregion' => 'required|string|max:25',
        ];
    
        $customMessages = [
            'required' => 'le champ :attribute est requis.',
            'email' => "l'email est incorrect.",
            'numeric' => "le numero de telephone n'est pas un numérique.",
            "string" => "vous devez entrer une chaîne de caractére.",
            "unique" => "l'email existe deja."
        ];
    
       
 
        /* $this->validate($request, $rules, $customMessages); */
        $request->validateWithBag('adduser',$rules, $customMessages);
        if(DB::table('prefecture')->insert([
         'name' => $request->Nom,
         'region_id'=> $request->Nregion,
         ]))
        return redirect('/dashboard/territoire/prefecture')->with('dsuccess',"l'ajout a été éffectué avec succès");
        return redirect('/dashboard/territoire/prefecture')->with('dfail',"il y a un problème lors de l'enregistrement ! veuillez réessayer...");
    }
}
