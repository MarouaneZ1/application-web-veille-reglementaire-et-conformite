<?php

namespace App\Http\Controllers;
use App\Models\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Notifications\TextNewAddNotify;
use Illuminate\Support\Facades\Notification;
use Illuminate\Notifications\Notifiable;
use Storage;
class Textereglementaire extends Controller
{
    //
    public function BO(){
        $BOS = DB::table('bos')->get();
        $data = ['LoggedUserInfo'=>users::where('id','=', session('LoggedUser'))->first()];
        return view('user_dashboard.Texte_reglementaire.BO',['BOs'=>$BOS],$data); 
    }
    public function add_BO(Request $request){
        $rules = [
            'name' => 'required|string|max:25',
            'Date' => 'required|string|max:25',
            'File'=> ['required'],
            'JoursArabe'=> 'required',
            'MoisArabe' => 'required',
            'Annesarabe' => 'required'
        ];
        $customMessages = [
            'required' => 'le champ :attribute est requis.',
            'email' => "l'email est incorrect.",
            'numeric' => "le numero de telephone n'est pas un numérique.",
            "string" => "vous devez entrer une chaîne de caractére.",
            "unique" => "l'email existe deja."
        ];
        $attributes=[
            'JoursArabe'=> 'Jour en arabe',
            'MoisArabe' => 'Mois en arabe',
            'Annesarabe' => 'Année en arabe',
        ];
        /* $this->validate($request, $rules, $customMessages); */
        $request->validateWithBag('adduser',$rules, $customMessages,$attributes);
       
        if($request->File()) {
            $name = time().'_'.$request->File->getClientOriginalName();
            $FilePath = $request->File->storeAs('uploads', $name, 'public');
        }
        if(DB::table('bos')->insert([
         'name' => $request->name,
         'date'=> $request->Date,
         'file' => $FilePath,
         'day_arabe'=> $request->JoursArabe,
         'mount_arabe'=> $request->MoisArabe,
         'year_arabe'=> $request->Annesarabe,
         ]))return redirect('/dashboard/TexteReglementaire/BO')->with('dsuccess',"l'ajout a été éffectué avec succès");
         return redirect('/dashboard/TexteReglementaire/BO')->with('dfail',"il y a un problème lors de l'enregistrement ! veuillez réessayer...");;
    }
    public function deleteBO(Request $request,$id){
        if(DB::table('bos')->where('id',$id)->delete())return redirect('/dashboard/TexteReglementaire/BO')->with('dsuccess',"la suppression a été effectuée");
        return redirect('/dashboard/TexteReglementaire/BO')->with('dfail',"un problème est survenu lors de la suppression,veuillez réessayer...");;
    }
    public function updateBO(Request $request){
        $rules = [
            'nameu' => 'required|string',
            'Dateu' => 'required|string',
            'File'=> ['required','mimes:pdf','max:5000000000000000000000000000000000000000000000000000000000000'],
            'JoursArabeu'=> 'required',
            'MoisArabeu' => 'required',
            'Annesarabeu' => 'required'
        ];
        $customMessages = [
            'required' => 'le champ :attribute est requis.',
            "string" => "vous devez entrer une chaîne de caractére.",
            "mimes" =>"vou devez choisir un fichier"
        ];
        $attributes=[
            'nameu' => 'Nom',
            'Dateu' => 'Date',
            'File'=> 'Fichier',
            'JoursArabeu'=> 'Jour en arabe',
            'MoisArabeu' => 'Mois en arabe',
            'Annesarabeu' => 'Année en arabe',
        ];
        $request->validateWithBag('updateuser',$rules, $customMessages,$attributes);
        $file=DB::table('bos')->where('id',$request->id)->value('file');
        if(Storage::exists(public_path($file))){
            Storage::delete(public_path($file));
            if($request->File()) {
                $name = time().'_'.$request->File->getClientOriginalName();
                $FilePath = $request->File->storeAs('uploads', $name, 'public');
            }
        }else{
            if($request->File()) {
                $name = time().'_'.$request->File->getClientOriginalName();
                $FilePath = $request->File->storeAs('uploads', $name, 'public');
            }
        }
           /* $this->validate($request, $rules, $customMessages); */
           
       if(DB::table('bos')
              ->where('id', $request->id)
              ->update([
                'name' => $request->nameu,
                'date'=> $request->Dateu,
                'file' => $FilePath,
                'day_arabe'=> $request->JoursArabeu,
                'mount_arabe'=> $request->MoisArabeu,
                'year_arabe'=> $request->Annesarabeu,
                ]))return redirect('/dashboard/TexteReglementaire/BO')->with('dsuccess',"la modification a été effectuée");
                return redirect('/dashboard/TexteReglementaire/BO')->with('dfail',"un problème est survenu lors de la modification,veuillez réessayer...");
    }
    public function texts(){

        $texts = DB::table('text')->get(); 
       // return  view('user_dashboard.utilisateurs.tableau',['region'=>$user_info]); 
       $data = ['LoggedUserInfo'=>users::where('id','=', session('LoggedUser'))->first()];
    foreach($texts as $k=>$v){
       $categorie_name=DB::table('category')->where('id',$v->category_id)->value('name');
       $activity_name=DB::table('activity')->where('id',$v->activity_id)->value('name');
       $themes_name=DB::table('themes')->where('id',$v->theme_id)->value('name');
       $bos_name=DB::table('bos')->where('id',$v->bo_id)->value('name');
       $texts[$k]->category_id=$categorie_name;
       $texts[$k]->activity_id=$activity_name;
       $texts[$k]->theme_id=$themes_name;
       $texts[$k]->bo_id=$bos_name;        
    }
    $categories=DB::table('category')->pluck('name','id');
    $BOS=DB::table('bos')->pluck('name','id');
    $themes=DB::table('themes')->pluck('name','id');
    $activity=DB::table('activity')->pluck('name','id');
        return view('user_dashboard.Texte_reglementaire.texts',['texts'=>$texts,'categories'=>$categories,'BOS'=>$BOS,'themes'=>$themes,'activity'=>$activity],$data);
    }
    public function delete_text(Request $request,$id){
        if(DB::table('text')->where('id',$id)->delete())return redirect('/dashboard/TexteReglementaire/texts')->with('dsuccess',"la suppression a été effectuée");
        return redirect('/dashboard/TexteReglementaire/texts')->with('dfail',"un problème est survenu lors de la suppression,veuillez réessayer...");;
    }
            
public function update_text(Request $request){
        $rules = [
           /* 'Nomentreprise' => 'required|string|max:25', */
           'BOu' => 'required',
           'Nomu' => 'required|string|max:25',
           'descriptionu' => 'required',
           'dateu' => 'required',
       ];
   
       $customMessages = [
           'required' => 'le champ :attribute est requis.',
           'email' => "l'email est incorrect.",
           'numeric' => "le numero de telephone n'est pas un numérique.",
           "string" => "vous devez entrer une chaîne de caractére.",
           "unique" => "l'email existe deja."
       ];
       $attributes=[
        /* 'Nomentreprise' => 'required|string|max:25', */
        'catu' => 'Catégorie',
        'BOu' => 'Bulletin officiel',
        'Nomu' => 'Nom',
        'descriptionu' => 'Description',
        'dateu' => 'Date',
    ];
       /* $this->validate($request, $rules, $customMessages); */
       $request->validateWithBag('updateuser',$rules, $customMessages,$attributes);
       DB::table('text')
              ->where('id', $request->id)
              ->update(['category_id'=>$request->catu,'bo_id' => $request->BOu,'name' => $request->Nomu,'description' => $request->descriptionu,'date' => $request->dateu,'theme_id' => $request->themeu,'activity_id' => $request->activiteu]);
       return redirect('/dashboard/TexteReglementaire/texts')->with('dsuccess',"la modification a été effectuée");
       redirect('/dashboard/TexteReglementaire/texts')->with('dfail',"un problème est survenu lors de la modification,veuillez réessayer...");
    }

    public function add_text(Request $request){
        $rules = [
            /* 'Nomentreprise' => 'required|string|max:25', */
            'BO' => 'required',
            'Nom'=> 'required|string|max:25',
            'description'=> 'required',
            'date'=> 'required'
        ];
     
        $customMessages = [
            'required' => 'le champ :attribute est requis.',
            'email' => "l'email est incorrect.",
            'numeric' => "le numero de telephone n'est pas un numérique.",
            "string" => "vous devez entrer une chaîne de caractére.",
            "unique" => "l'email existe deja."
        ];
        $attributes=[
            /* 'Nomentreprise' => 'required|string|max:25', */
            'cat' => 'Catégorie',
            'BO' => 'Bultin officiel',
            'Nom' => 'Nom',
            'description' => 'Description',
            'date' => 'Date',
        ];
        /* $this->validate($request, $rules, $customMessages); */
        $request->validateWithBag('adduser',$rules, $customMessages,$attributes);
        if(DB::table('text')->insert([
         /* 'category_id' => $request->cat, */
         'bo_id'=> $request->BO,
         'name' => $request->Nom,
         'theme_id' => $request->theme,
         'activity_id' => $request->activite,
         'description'=> $request->description,
         'date'=> $request->date,
         'state'=> $request->status,
         'createdAt'=>'2020-11-07',
         'updateAt'=>'2020-11-07'
         ])){
             
            
            $emails=DB::table('user_themes')->join('users','users.id','=','user_themes.user_id')->join('users_activities','users.id','=','users_activities.user_id')
          ->where('user_themes.theme_id',$request->theme)
          ->where('users_activities.activity_id',$request->activite)
          ->pluck('users.email');
         
           
        foreach($emails as $email){
            Notification::route('mail' , $email) 
                          ->notify(new TextNewAddNotify($request));
                          } 
        return redirect('/dashboard/TexteReglementaire/texts')->with("dsuccess","une notification d'ajout du texte est envoyée à touts les clients consernés");
    }
    return redirect('/dashboard/TexteReglementaire/texts')->with("dfail","il y a un problème lors de l'envoie des email");
}
    public function rules(){
        $rules = DB::table('rules')->get(); 
        $data = ['LoggedUserInfo'=>users::where('id','=', session('LoggedUser'))->first()];
        return  view('user_dashboard.Texte_reglementaire.rules',['rules'=>$rules],$data); 
    }
    public function deleterule(Request $request,$id){
        if(DB::table('rules')->where('id',$id)->delete())return redirect('/dashboard/TexteReglementaire/rules')->with('dsuccess',"la suppression a été effectuée");
        return redirect('/dashboard/TexteReglementaire/rules')->with('dfail',"un problème est survenu lors de la suppression,veuillez réessayer...");
    }
    public function updaterule(Request $request){
        $rules = [
           'text_idu' => 'required|numeric',
           'contentu' => 'required|string',
           'avisu'=> 'required|string|max:30',
           'referenceu'=> 'required|string|max:30',
           

       ];
   
       $customMessages = [
           'required' => 'le champ :attribute est requis.',
           'email' => "l'email est incorrect.",
           'numeric' => "le champ  doit etre numérique.",
           "string" => "vous devez entrer une chaîne de caractére.",
           "unique" => "l'éxigence existe deja."
       ];
   
       $attributes=[
        /* 'Nomentreprise' => 'required|string|max:25', */
        'text_id' => 'text',
        'contentu' => 'content',
        'avisu'=> 'avis',
        'referenceu'=> 'reference',
    ];
       /* $this->validate($request, $rules, $customMessages); */
       $request->validateWithBag('updateuser',$rules, $customMessages,$attributes);
       if(DB::table('rules')
              ->where('id', $request->id)
              ->update(['text_id'=>$request->text_idu,'content' => $request->contentu,'avis'=>$request->avisu,'reference'=>$request->referenceu]))return redirect('/dashboard/TexteReglementaire/rules')->with('dsuccess',"la modification a été effectuée");
              return redirect('/dashboard/TexteReglementaire/rules')->with('dfail',"un problème est survenu lors de la modification,veuillez réessayer...");
    }
    public function addrule(Request $request){
        $rules = [ 
            'text_id' => 'required|numeric|exists:text,id',
            'content' => 'required|string',
            'avis'=> 'required|string|max:30',
            'reference'=> 'required|string|max:30',
            
 
        ];
    
        $customMessages = [
            'required' => 'le champ :attribute est requis.',
            'email' => "l'email est incorrect.",
            'numeric' => "le champ  doit etre numérique.",
            "string" => "vous devez entrer une chaîne de caractére.",
            "unique" => "l'éxigence existe deja.",
            "exists"=>"il faut entrer un id qui existe deja"
        ];
        $attributes=[
            /* 'Nomentreprise' => 'required|string|max:25', */
            'text_id' => 'text'
        ];
        /* $this->validate($request, $rules, $customMessages); */
        $request->validateWithBag('adduser',$rules, $customMessages,$attributes);
       if(DB::table('rules')->insert([
        'text_id'=>$request->text_id,'content' => $request->content,'avis'=>$request->avis,'reference'=>$request->reference,'createdAt'=>'2017-09-07','updateAt'=>'2017-09-07','status'=>'online'
        ]))return redirect('/dashboard/TexteReglementaire/rules')->with('dsuccess',"l'ajout a été éffectué avec succès");
       return redirect('/dashboard/TexteReglementaire/rules')->with('dfail',"il y a un problème lors de l'enregistrement ! veuillez réessayer...");;
    }
    public function sanctions(){
        $sanctions = DB::table('sanctions')->join('text','text.id',"=",'sanctions.text_id')->select('text.description','sanctions.id', 'sanctions.text_id', 'sanctions.updated_by_id', 'sanctions.content', 'sanctions.avis', 'sanctions.createdAt', 'sanctions.updateAt', 'sanctions.status', 'sanctions.reference')->get(); 
        $texts=DB::table('text')->pluck('description','id');
        $data = ['LoggedUserInfo'=>users::where('id','=', session('LoggedUser'))->first()];
        return  view('user_dashboard.Texte_reglementaire.sanctions',['sanctions'=>$sanctions,'texts'=>$texts],$data); 
    }
    public function deletesanction(Request $request,$id){
        if(DB::table('sanctions')->where('id',$id)->delete())return redirect('/dashboard/TexteReglementaire/sanctions')->with('dsuccess',"la suppression a été effectuée");
        return redirect('/dashboard/TexteReglementaire/sanctions')->with('dfail',"un problème est survenu lors de la suppression,veuillez réessayer...");
    }
    public function updatesanction(Request $request){
        $sanctions = [ 
            'contentu' => 'required|string',
            'avisu'=> 'required|string',
            'referenceu'=> 'required|string',
        ];
    
        $customMessages = [
            'required' => 'le champ :attribute est requis.',
            "string" => "vous devez entrer une chaîne de caractére.",
        ];
        $attributes=[
            'text_id' => 'text',
            'contentu' => 'contenu',
            'avisu'=> 'avis',
            'referenceu'=> 'référence'
        ];
        /* $this->validate($request, $sanctions, $customMessages); */
        $request->validateWithBag('updateuser',$sanctions, $customMessages,$attributes);
       $affected = DB::table('sanctions')
              ->where('id', $request->sanctionid)
              ->update(['text_id'=>$request->textu_id,'content' => $request->contentu,'avis'=>$request->avisu,'reference'=>$request->referenceu]);
       if($affected)return redirect('/dashboard/TexteReglementaire/sanctions')->with('dsuccess',"la modification a été effectuée");
       return redirect('/dashboard/TexteReglementaire/sanctions')->with('dfail',"un problème est survenu lors de la modification,veuillez réessayer...");
    }
    public function addsanction(Request $request){
        $sanctions = [ 
            'content' => 'required|string',
            'avis'=> 'required|string',
            'reference'=> 'required|string',
        ];
    
        $customMessages = [
            'required' => 'le champ :attribute est requis.',
            "string" => "vous devez entrer une chaîne de caractére.",
        ];
        $attributes=[
            'text_id' => 'text'
        ];
        /* $this->validate($request, $sanctions, $customMessages); */
        $request->validateWithBag('adduser',$sanctions, $customMessages,$attributes);
       if(DB::table('sanctions')->insert([
        'text_id'=>$request->text_id,'content' => $request->content,'avis'=>$request->avis,'reference'=>$request->reference,'status'=>'online'
        ]))return redirect('/dashboard/TexteReglementaire/sanctions')->with('dsuccess',"l'ajout a été éffectué avec succès");
        redirect('/dashboard/TexteReglementaire/sanctions')->with('dfail',"il y a un problème lors de l'enregistrement! veuillez réessayer...");
    }
    public function definitions(){
        $texts=DB::table('text')->pluck('description','id');
        $definitions = DB::table('definitions')->join('text','text.id',"=",'definitions.text_id')->select('text.description','definitions.id', 'definitions.text_id', 'definitions.updated_by_id', 'definitions.content', 'definitions.avis', 'definitions.createdAt', 'definitions.updateAt', 'definitions.status', 'definitions.reference', 'definitions.name')->get(); 
        $data = ['LoggedUserInfo'=>users::where('id','=', session('LoggedUser'))->first()];
        return  view('user_dashboard.Texte_reglementaire.definitions',['definitions'=>$definitions,'texts'=>$texts],$data); 
    }
    public function deletedefinition(Request $request,$id){
        if(DB::table('definitions')->where('id',$id)->delete())return redirect('/dashboard/TexteReglementaire/definitions')->with('dsuccess',"la suppression a été effectuée");
        return redirect('/dashboard/TexteReglementaire/definitions')->with('dfail',"un problème est survenu lors de la suppression,veuillez réessayer...");
    }
    public function updatedefinition(Request $request){
        $definitions = [ 
            'nameu' => 'required',
            'contentu' => 'required|string',
            'avisu'=> 'required|string',
            'referenceu'=> 'required|string',
        ];
    
        $customMessages = [
            'required' => 'le champ :attribute est requis.',
            "string" => "vous devez entrer une chaîne de caractére.",
        ];
        $attributes=[
            'contentu' => 'contenu',
            'avisu'=> 'avis',
            'nameu'=>'name',
            'referenceu'=> 'référence'
        ];
        /* $this->validate($request, $definitions, $customMessages); */
        $request->validateWithBag('updateuser',$definitions, $customMessages,$attributes);
       $affected = DB::table('definitions')
              ->where('id', $request->definitionid)
              ->update(['text_id'=>$request->textu_id,'content' => $request->contentu,'avis'=>$request->avisu,'reference'=>$request->referenceu,'name'=>$request->nameu]);
       if($affected)return redirect('/dashboard/TexteReglementaire/definitions')->with('dsuccess',"la modification a été effectuée");
       return redirect('/dashboard/TexteReglementaire/definitions')->with('dfail',"un problème est survenu lors de la modification,veuillez réessayer...");
    }
    public function adddefinition(Request $request){
        $sanctions = [ 
            'name' => 'required',
            'content' => 'required|string',
            'avis'=> 'required|string',
            'reference'=> 'required|string',
        ];
    
        $customMessages = [
            'required' => 'le champ :attribute est requis.',
            "string" => "vous devez entrer une chaîne de caractére.",
        ];
        $attributes=[
            'text_id' => 'text'
        ];
        /* $this->validate($request, $sanctions, $customMessages); */
        $request->validateWithBag('adduser',$sanctions, $customMessages,$attributes);
       if(DB::table('definitions')->insert([
        'text_id'=>$request->text_id,'content' => $request->content,'avis'=>$request->avis,'reference'=>$request->reference,'status'=>'online','name'=>$request->name
        ]))return redirect('/dashboard/TexteReglementaire/definitions')->with('dsuccess',"l'ajout a été éffectué avec succès");
        redirect('/dashboard/TexteReglementaire/definitions')->with('dfail',"il y a un problème lors de l'enregistrement ! veuillez réessayer...");
    
    }
}
