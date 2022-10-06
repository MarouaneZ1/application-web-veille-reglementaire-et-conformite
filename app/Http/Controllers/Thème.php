<?php

namespace App\Http\Controllers;
use App\Models\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Thème extends Controller
{
    //
    public function theme(){
        $themes = DB::table('themes')->get(); 
        $data = ['LoggedUserInfo'=>users::where('id','=', session('LoggedUser'))->first()];
        return  view('user_dashboard.themes.theme',['themes'=>$themes],$data); 
    }
    public function addtheme(Request $request){
        $rules = [
            'namet' => 'required|string|max:30|unique:themes,id',
        ];
    
        $customMessages = [
            'required' => 'le champ :attribute est requis.',
            'numeric' => "Saisir un nombre",
            "string" => "vous devez entrer une chaîne de caractére.",
            "unique" => "le théme existe déjà"
        ];
        $attributes = [
            'namet' => 'Nom'
        ];
    
       /* $this->validate($request, $rules, $customMessages); */
       $request->validateWithBag('adduser',$rules, $customMessages,$attributes);
       if(DB::table('themes')->insert([
        'name'=>$request->namet
        ]))return redirect('/dashboard/themes/theme')->with('dsuccess',"l'ajout a été éffectué avec succès");
        return redirect('/dashboard/themes/theme')->with('dfail',"il y a un problème lors de l'enregistrement ! veuillez réessayer...");
    }
    public function deletetheme(Request $request,$id){
        if(DB::table('themes')->where('id',$id)->delete())return redirect('/dashboard/themes/theme')->with('dsuccess',"la suppression a été effectuée");
        return redirect('/dashboard/themes/theme')->with('dfail',"un problème est survenu lors de la suppression,veuillez réessayer...");
    }
    public function updatetheme(Request $request){
        $rules = [
           'name' => 'required|string|max:30',
           
           
       ];
   
       $customMessages = [
           'required' => 'le champ :attribute est requis.',
           "string" => "vous devez entrer une chaîne de caractére."
       ];
   
       /* $this->validate($request, $rules, $customMessages); */
       $request->validateWithBag('updateuser',$rules, $customMessages);
       if(DB::table('themes')
              ->where('id',$request->id)
              ->update(['name'=>$request->name]))return redirect('/dashboard/themes/theme')->with('dsuccess',"la modification a été effectuée");
              return redirect('/dashboard/themes/theme')->with('dfail',"un problème est survenu lors de la modification,veuillez réessayer...");
    }
    public function aspects(){
        $aspects = DB::table('n1_aspect')->join('themes','themes.id','=','n1_aspect.theme_id')->select('n1_aspect.id', 'n1_aspect.name', 'n1_aspect.theme_id','themes.name AS themesname')->get();
        $themes = DB::table('themes')->pluck('name','id');
        $data = ['LoggedUserInfo'=>users::where('id','=', session('LoggedUser'))->first()];
        return view('user_dashboard.themes.aspects',['aspects'=>$aspects,'themes'=>$themes],$data); 
    }
    public function deleteaspect(Request $request,$id){
        if(DB::table('n1_aspect')->where('id',$id)->delete())return redirect('/dashboard/themes/aspects')->with('dsuccess',"la suppression a été effectuée");
        return redirect('/dashboard/themes/aspects')->with('dfail',"un problème est survenu lors de la suppression,veuillez réessayer...");
    }
    public function updateaspect(Request $request){
        $rules = [
           'name' => 'required|string|max:30',
           'n1aspect'=>'required|numeric'
       ];
   
       $customMessages = [
           'required' => 'le champ :attribute est requis.',
           'numeric' => "Saisir un nombre",
           "string" => "vous devez entrer une chaîne de caractére."
       ];
   
       /* $this->validate($request, $rules, $customMessages); */
       $request->validateWithBag('updateuser',$rules, $customMessages);
       if(DB::table('n1_aspect')
              ->where('id', $request->id)
              ->update(['name'=>$request->name,'theme_id'=>$request->n1aspect]))return redirect('/dashboard/themes/aspects')->with('dsuccess',"la modification a été effectuée");
              return redirect('/dashboard/themes/aspects')->with('dfail',"un problème est survenu lors de la modification,veuillez réessayer...");
    }
    public function addaspect(Request $request){
        $rules = [
            'namea' => 'required|string|max:30|unique:n1_aspect,id',
            'n1aspecta'=>'required|numeric'
        ];
        $customMessages = [
            'required' => 'le champ :attribute est requis.',
            'numeric' => "Saisir un nombre",
            "string" => "vous devez entrer une chaîne de caractére.",
            "unique" => "l'aspect existe déjà"
        ];
        $attributes = [
            'namea' => 'Nom',
            'n1aspecta'=>'N° du theme'
        ];
    
    
       $request->validateWithBag('adduser',$rules, $customMessages,$attributes );
       if(DB::table('n1_aspect')->insert([
        'name'=>$request->namea,
        'theme_id'=>$request->n1aspecta
        ]))return redirect('/dashboard/themes/aspects')->with('dsuccess',"l'ajout a été éffectué avec succès");
        return redirect('/dashboard/themes/aspects')->with('dfail',"il y a un problème lors de l'enregistrement ! veuillez réessayer...");
    }
    public function sousaspects(){
        $sousaspects = DB::table('n2_aspect')->join('n1_aspect','n1_aspect.id','=','n2_aspect.n1_aspect_id')->select('n2_aspect.id', 'n2_aspect.n1_aspect_id', 'n2_aspect.name','n1_aspect.name AS n1_aspectname')->get();
        $aspects = DB::table('n1_aspect')->pluck('name','id');
        $data = ['LoggedUserInfo'=>users::where('id','=', session('LoggedUser'))->first()];
        return view('user_dashboard.themes.sousaspects',['sousaspects'=>$sousaspects,'aspects'=>$aspects],$data); 
    }
   
      
    
    public function deletesousaspect(Request $request,$id){
        if(DB::table('n2_aspect')->where('id',$id)->delete())
        return redirect('/dashboard/themes/sousaspects')->with('dsuccess',"la suppression a été effectuée");
        return redirect('/dashboard/themes/sousaspects')->with('dfail',"un problème est survenu lors de la suppression,veuillez réessayer...");
    }
    public function updatesousaspect(Request $request){
        $rules = [
           'name' => 'required|string|max:30|unique:n2_aspect,id',
           'n2aspect'=>'required|numeric'
        
       ];
   
       $customMessages = [
           'required' => 'le champ :attribute est requis.',
           'numeric' => "Saisir un nombre",
           "string" => "vous devez entrer une chaîne de caractére.",
           "unique" => "le sous aspect existe déjà"
       ];
   
       $request->validateWithBag('updateuser',$rules, $customMessages);
       if(DB::table('n2_aspect')
              ->where('id', $request->id)
              ->update(['name'=>$request->name,'n1_aspect_id'=>$request->n2aspect]))
       return redirect('/dashboard/themes/sousaspects')->with('dsuccess',"la modification a été effectuée");
       return redirect('/dashboard/themes/sousaspects')->with('dfail',"un problème est survenu lors de la modification,veuillez réessayer...");
    }
    
    public function addsousaspect(Request $request){
        $rules = [
            'names' => 'required|string|max:30',
            'n2aspects'=>'required|numeric'
            
            
        ];
    
        $customMessages = [
            'required' => 'le champ :attribute est requis.',
            'numeric' => "Saisir un nombre",
            "string" => "vous devez entrer une chaîne de caractére."
        ];
        $attributes = [
            'names' => 'Nom',
            'n2aspects'=>'N°1 Aspect'
        ];
    
    
        $request->validateWithBag('adduser',$rules, $customMessages);
       if(DB::table('n2_aspect')->insert([
        'name'=>$request->names,
        'n1_aspect_id'=>$request->n2aspects
        ]))
       return redirect('/dashboard/themes/sousaspects')->with('dsuccess',"l'ajout a été éffectué avec succès");
       return redirect('/dashboard/themes/sousaspects')->with('dfail',"il y a un problème lors de l'enregistrement ! veuillez réessayer...");
    }
}
