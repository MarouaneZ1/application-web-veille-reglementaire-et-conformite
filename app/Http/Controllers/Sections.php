<?php

namespace App\Http\Controllers;
use App\Models\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Sections extends Controller
{
    //
    public function sections(){
        $sections = DB::table('section')->get(); 
        $data = ['LoggedUserInfo'=>users::where('id','=', session('LoggedUser'))->first()];
        return  view('user_dashboard.sections.sections',['sections'=>$sections],$data); 
    }
    public function deletesections(Request $request,$id){
        if(DB::table('section')->where('id',$id)->delete())
        return redirect('/dashboard/secteursdactivites/sections')->with('dsuccess',"la suppression a été effectuée");
        return redirect('/dashboard/secteursdactivites/sections')->with('dfail',"un problème est survenu lors de la suppression,veuillez réessayer...");
    }
    public function updatesections(Request $request){
        $rules = [
           /* 'Nomentreprise' => 'required|string|max:25', */
           'Name' => 'required|string|max:25',
           'Code' => 'required|numeric',
       ];
   
       $customMessages = [
           'required' => 'le champ :attribute est requis.',
           'numeric' => "entrez un nombre.",
       ];

   
       /* $this->validate($request, $rules, $customMessages); */
       $request->validateWithBag('updateuser',$rules, $customMessages);
       if(DB::table('section')
              ->where('id',  $request->id)
              ->update(['code'=>$request->Code,'name' => $request->Name]))
       return redirect('/dashboard/secteursdactivites/sections')->with('dsuccess',"la modification a été effectuée");
       return redirect('/dashboard/secteursdactivites/sections')->with('dfail',"un problème est survenu lors de la modification,veuillez réessayer...");
    }
    public function addsections(Request $request){
        $rules = [
           /* 'Nomentreprise' => 'required|string|max:25', */
           'Names' => 'required|string|max:25|unique:section,id',
           'Codes' => 'required|numeric',
       ];
   
       $customMessages = [
           'required' => 'le champ :attribute est requis.',
           'numeric' => "entrez un nombre.",
           'unique'=>"la section existe deja",
           'string'=>"entrer une chaine de caractére"
       ];
       $attributes = [
        'Names' => 'Nom',
        'Codes' => 'Code'
       
    ]; 
   
       /* $this->validate($request, $rules, $customMessages); */
       $request->validateWithBag('adduser',$rules, $customMessages,$attributes);
       if(DB::table('section')->insert(['code'=>$request->Codes,'name' => $request->Names]))
       return redirect('/dashboard/secteursdactivites/sections')->with('dsuccess',"l'ajout a été éffectué avec succès");
       return redirect('/dashboard/secteursdactivites/sections')->with('dfail',"il y a un problème lors de l'enregistrement ! veuillez réessayer...");
    }
    public function branche(){
        $branches = DB::table('n1_activities')->join('section','n1_activities.section_id','=','section.id')->select('n1_activities.id', 'n1_activities.code', 'n1_activities.name', 'n1_activities.section_id',
        'section.name AS sectionname')->get();
        $sections=DB::table('section')->pluck('name','id');
        $data = ['LoggedUserInfo'=>users::where('id','=', session('LoggedUser'))->first()];
        return view('user_dashboard.sections.branche',['branches'=>$branches,'sections'=>$sections],$data); 
    }
    public function deletebranche(Request $request,$id){
        if(DB::table('n1_activities')->where('id',$id)->delete())
        return redirect('/dashboard/secteursdactivites/branche')->with('dsuccess',"la suppression a été effectuée");
        return redirect('/dashboard/secteursdactivites/branche')->with('dfail',"un problème est survenu lors de la suppression,veuillez réessayer...");
    }
    public function updatebranche(Request $request){
        $rules = [
           /* 'Nomentreprise' => 'required|string|max:25', */
           'Name' => 'required|string|max:25',
           'Code' => 'required|max:25',
           'Nsection'=> 'required',
       ];
   
       $customMessages = [
           'required' => 'le champ :attribute est requis.',
           'numeric' => "entrez un nombre.",
       ];
       /* $this->validate($request, $rules, $customMessages); */
       $request->validateWithBag('updateuser',$rules, $customMessages);
       if(DB::table('n1_activities')
              ->where('id',  $request->id)
              ->update(['code'=>$request->Code,'name' => $request->Name,'section_id'=>$request->Nsection]))
       return redirect('/dashboard/secteursdactivites/branche')->with('dsuccess',"la modification a été effectuée");
       return redirect('/dashboard/secteursdactivites/branche')->with('dfail',"un problème est survenu lors de la modification,veuillez réessayer...");
    }
    public function addbranche(Request $request){
        $rules = [
           /* 'Nomentreprise' => 'required|string|max:25', */
           'Nameb' => 'required|string|max:25|unique:n1_activities,id',
           'Codeb' => 'required',
           'Nsectionb'=> 'required',
       ];
   
       $customMessages = [
           'required' => 'le champ :attribute est requis.',
           'numeric' => "entrez un nombre.",
           'string'=>"entrez une chaine de caractére.",
           'unique'=>"la branche existe deja"
       ];

       $attributes = [
        'Nameb' => 'Nom',
        'Codeb' => 'Code',
        'Nsectionb'=> 'N° Section ',
       
    ]; 
   
       /* $this->validate($request, $rules, $customMessages); */
       $request->validateWithBag('adduser',$rules, $customMessages,$attributes);
       if(DB::table('n1_activities')->insert(['code'=>$request->Codeb,'name' => $request->Nameb,'section_id'=>$request->Nsectionb]))
       return redirect('/dashboard/secteursdactivites/branche')->with('dsuccess',"l'ajout a été éffectué avec succès");
       return redirect('/dashboard/secteursdactivites/branche')->with('dfail',"il y a un problème lors de l'enregistrement ! veuillez réessayer...");
    }
    public function activities(){
        $activites = DB::table('activity')->join('section','activity.section_id','=','section.id')->join('n1_activities','activity.n1_activity_id','=','n1_activities.id')->join('n2_activities','activity.n2_activity_id','=','n2_activities.id')->select('activity.id', 'activity.name', 'activity.n2_activity_id', 'activity.code', 'activity.section_id', 'activity.n1_activity_id',
        'section.name AS sectionname','n1_activities.name AS n1_activitiesname','n2_activities.name AS n2_activitiesname')->get();
        $sections=DB::table('section')->pluck('name','id');
        $branches=DB::table('n1_activities')->pluck('name','id');
        $sousbranches=DB::table('n2_activities')->pluck('name','id');
        $data = ['LoggedUserInfo'=>users::where('id','=', session('LoggedUser'))->first()];
        return view('user_dashboard.sections.activites',['activites'=>$activites,'branches'=>$branches,'sections'=>$sections,'sousbranches'=>$sousbranches],$data); 
    }
    public function deleteactivity(Request $request,$id){
        if(DB::table('activity')->where('id',$id)->delete())
        return redirect('/dashboard/secteursdactivites/activities')->with('dsuccess',"la suppression a été effectuée");
        return redirect('/dashboard/secteursdactivites/activities')->with('dfail',"un problème est survenu lors de la suppression,veuillez réessayer...");
    }
    public function updateactivity(Request $request){
        $rules = [
        'name' => 'required|string|max:70',
        'Code' => 'required|numeric',
        'n2activite'=> 'numeric',
        'n1activite'=> 'numeric',
        'nsection'=> 'numeric',
    ];

    $customMessages = [
        'required' => 'le champ :attribute est requis.',
        'numeric' => "Saisir un nombre",
        "string" => "vous devez entrer une chaîne de caractére.",
       
    ];

    /* $this->validate($request, $rules, $customMessages); */
    $request->validateWithBag('updateuser',$rules, $customMessages);
   if(DB::table('activity')
            ->where('id', $request->id)
            ->update(['name'=>$request->name,'code' => $request->Code,'n2_activity_id'=>$request->n2activite,'section_id'=>$request->nsection,'n1_activity_id'=>$request->n1activite]))
    return redirect('/dashboard/secteursdactivites/activities')->with('dsuccess',"la modification a été effectuée");
    return redirect('/dashboard/secteursdactivites/activities')->with('dfail',"un problème est survenu lors de la modification,veuillez réessayer...");
    }
    public function addactivity(Request $request){
        $rules = [
            'namea' => 'required|string|max:70|unique:activity,id',
            'Codea' => 'required|numeric',
            'n2activitea'=> 'numeric',
            'n1activitea'=> 'numeric',
            'nsectiona'=> 'numeric',
        ];
    
        $customMessages = [
            'required' => 'le champ :attribute est requis.',
            'numeric' => "Saisir un nombre",
            "string" => "vous devez entrer une chaîne de caractére.",
            "unique" => "l'activité existe déjà"
        ];
        $attributes = [
            'namea' => 'Nom',
            'Codea' => 'Code',
            'n2activitea' => 'Activité 2',
            'n1activitea' => 'Activité 1',
          'nsectiona' => 'N° Section '
        ]; 
       /* $this->validate($request, $rules, $customMessages); */
       $request->validateWithBag('adduser',$rules, $customMessages,$attributes);
       if(DB::table('activity')->insert([
        'name'=>$request->namea,
        'code' => $request->Codea,
        'enabled' => 1,
        'n2_activity_id'=>$request->n2activitea,
        'section_id'=>$request->nsectiona,
        'n1_activity_id'=>$request->n1activitea
        ]))
       return redirect('/dashboard/secteursdactivites/activities')->with('dsuccess',"l'ajout a été éffectué avec succès");
       return redirect('/dashboard/secteursdactivites/activities')->with('dfail',"il y a un problème lors de l'enregistrement ! veuillez réessayer...");
    }
    public function sousbranche(){
        $sousbranches = DB::table('n2_activities')->join('section','n2_activities.section_id','=','section.id')->join('n1_activities','n2_activities.n1_activity_id','=','n1_activities.id')->select('n2_activities.id', 'n2_activities.n1_activity_id', 'n2_activities.code', 'n2_activities.name', 'n2_activities.section_id',
        'section.name AS sectionname','n1_activities.name AS n1_activitiesname')->get();
        $sections=DB::table('section')->pluck('name','id');
        $branches=DB::table('n1_activities')->pluck('name','id');
        $data = ['LoggedUserInfo'=>users::where('id','=', session('LoggedUser'))->first()];
        return view('user_dashboard.sections.sousbranche',['sousbranches'=>$sousbranches,'branches'=>$branches,'sections'=>$sections],$data); 
    }
    public function deletesousbranche(Request $request,$id){
        if(DB::table('n2_activities')->where('id',$id)->delete())
        return redirect('/dashboard/secteursdactivites/sousbranche')->with('dsuccess',"la suppression a été effectuée");
        return redirect('/dashboard/secteursdactivites/sousbranche')->with('dfail',"un problème est survenu lors de la suppression,veuillez réessayer...");
    }
    public function updatesousbranche(Request $request){
        $rules = [
           /* 'Nomentreprise' => 'required|string|max:25', */
           'Name' => 'required|string|max:25',
           'Code' => 'required|numeric|max:25',
           'Nsection'=> 'required|numeric',
           'Nbranche'=> 'required|numeric',
       ];
   
       $customMessages = [
           'required' => 'le champ :attribute est requis.',
           'numeric' => "entrez un nombre.",
       ];
   
       $request->validateWithBag('updateuser',$rules, $customMessages);
       if(DB::table('n2_activities')
              ->where('id',  $request->id)
              ->update(['code'=>$request->Code,'name' => $request->Name,'section_id'=>$request->Nsection,'n1_activity_id'=>$request->Nbranche]))
       return redirect('/dashboard/secteursdactivites/sousbranche')->with('dsuccess',"la modification a été effectuée");
       return redirect('/dashboard/secteursdactivites/sousbranche')->with('dfail',"un problème est survenu lors de la modification,veuillez réessayer...");
    }
    public function addsousbranche(Request $request){
        $rules = [
           /* 'Nomentreprise' => 'required|string|max:25', */
           'Names' => 'required|string|max:25|unique:n2_activities,id',
           'Codes' => 'required|numeric|max:25',
           'Nsections'=> 'required',
           'Nbranches'=> 'required',
       ];
   
       $customMessages = [
           'required' => 'le champ :attribute est requis.',
           'numeric' => "entrez un nombre.",
           'unique' => "Sous branche existe deja.",

       ];
       $attributes = [
        'Names' => 'Nom',
        'Codes' => 'Code',
        'Nbranches' => 'Activité 1',
      'Nsections' => 'N° Section '
    ];
       /* $this->validate($request, $rules, $customMessages); */
       $request->validateWithBag('adduser',$rules, $customMessages,$attributes);
       if(DB::table('n2_activities')->insert(['code'=>$request->Codes,'name' => $request->Names,'section_id'=>$request->Nsections,'n1_activity_id'=>$request->Nbranches]))
       return redirect('/dashboard/secteursdactivites/sousbranche')->with('dsuccess',"l'ajout a été éffectué avec succès");
       return redirect('/dashboard/secteursdactivites/sousbranche')->with('dfail',"il y a un problème lors de l'enregistrement ! veuillez réessayer...");
    }
    
    
    
}
