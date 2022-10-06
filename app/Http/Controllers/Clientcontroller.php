<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\users;
class Clientcontroller extends Controller
{

    //
    public function client()
    {    
        $texts_pla=DB::table('plan')->where('user_id',session('Loggedclient'))->get();
         $texts_plan=DB::table('text')->join('plan','text.id',"=",'plan.text_id')->where('plan.user_id',session('Loggedclient'))
         ->where('plan.accompli',0)
        ->select('plan.id','plan.content','plan.title','plan.plan_creator','plan.status','plan.user_id','plan.type','plan.criticality','plan.date','text.description')
        ->get();
        
        for($i=0;$i<count($texts_plan);$i++){
            $user_first=DB::table('users')->where('id',session('Loggedclient'))->value('first_name');
            $user_last=DB::table('users')->where('id',session('Loggedclient'))->value('last_name');
            $creator_first=DB::table('users')->where('id',$texts_plan[$i]->plan_creator)->value('first_name');
            $creator_last=DB::table('users')->where('id',$texts_plan[$i]->plan_creator)->value('last_name');
            $texts_plan[$i]->user_first= $user_first;
            $texts_plan[$i]->user_last= $user_last;
            $texts_plan[$i]->creator_first= $creator_first;
            $texts_plan[$i]->creator_last= $creator_last;
        }
        
        return view('client.user',['texts_plan'=>$texts_plan]);
    }
    public function env()
    {
        $soc = DB::table('users')->where('id','=', session('Loggedclient'))->value('society_id');
        $suser_id=DB::table('users')->where('society_id','=', $soc)->where('profile','SUser')->value('id');
        $activity=DB::table('users_activities')->where('user_id',$suser_id)->pluck('activity_id');
        $texts=DB::table('text')->where('theme_id',1)->whereIn('activity_id', $activity)->get();
        $assigned=DB::table('text')->join('plan','text.id',"=",'plan.text_id')->where('plan.society_id',$soc)->where('plan_creator',$suser_id)->where('plan.user_id',session('Loggedclient'))->where('plan.accompli',0)->pluck('text_id','plan.id');
        $deja_evalue=DB::table('text')->join('plan','text.id',"=",'plan.text_id')->where('plan.society_id',$soc)->where('plan_creator',$suser_id)->where('plan.user_id',"!=",session('Loggedclient'))->where('plan.accompli',0)->pluck('text_id','plan.id');
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
            else{
                $conforme=1;
            }
            if(in_array($text->id, json_decode(json_encode($assigned), true))){
                $assign="Le plan d'actions de ce texte est assigné à vous";
            }
            elseif(in_array($text->id, json_decode(json_encode($deja_evalue), true))){
                $assign="Ce texte est déjà évalué par votre supérieur";
            }
            else{
                $assign="0";
            }
            $lesexpires+=DB::table('plan')->where('text_id',$text->id)->where('society_id',$soc)->where('accompli',0)->where('date',"<",$date_now)->count();
            $lesnonexpires+=DB::table('plan')->where('text_id',$text->id)->where('society_id',$soc)->where('accompli',0)->where('date',">=",$date_now)->count();
            $lesconformes+= DB::table('rules_conformite')->where('text_id',$text->id)->where('society_id',$soc)->where('isConforme',1)->count();
            $lesnonconformes+= DB::table('rules_conformite')->where('text_id',$text->id)->where('society_id',$soc)->where('isConforme',0)->count();
           
            $text->conformite=$conforme;
            $text->assign=$assign; 
            
        }
        $total=$lesconformes+$lesnonconformes;
        $expiration=$lesexpires+$lesnonexpires;   
        return view('client.texts',['texts'=>$texts,'lesconformes'=>$lesconformes,'lesnonconformes'=>$lesnonconformes, 'total'=>$total,'lesexpires'=>$lesexpires,'lesnonexpires'=>$lesnonexpires,'expiration'=>$expiration]);
    }
    public function hsst()
    {
        $soc = DB::table('users')->where('id','=', session('Loggedclient'))->value('society_id');
        $suser_id=DB::table('users')->where('society_id','=', $soc)->where('profile','SUser')->value('id');
        $activity=DB::table('users_activities')->where('user_id',$suser_id)->pluck('activity_id');
        $texts=DB::table('text')->where('theme_id',2)->whereIn('activity_id', $activity)->get();
        $assigned=DB::table('text')->join('plan','text.id',"=",'plan.text_id')->where('plan.society_id',$soc)->where('plan_creator',$suser_id)->where('plan.user_id',session('Loggedclient'))->where('plan.accompli',0)->pluck('text_id','plan.id');
        $deja_evalue=DB::table('text')->join('plan','text.id',"=",'plan.text_id')->where('plan.society_id',$soc)->where('plan_creator',$suser_id)->where('plan.user_id',"!=",session('Loggedclient'))->where('plan.accompli',0)->pluck('text_id','plan.id');
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
            else{
                $conforme=1;
            }
            if(in_array($text->id, json_decode(json_encode($assigned), true))){
                $assign="Le plan d'actions de ce texte est assigné à vous";
            }
            elseif(in_array($text->id, json_decode(json_encode($deja_evalue), true))){
                $assign="Ce texte est déjà évalué par votre supérieur";
            }
            else{
                $assign="0";
            }
            $lesexpires+=DB::table('plan')->where('text_id',$text->id)->where('society_id',$soc)->where('accompli',0)->where('date',"<",$date_now)->count();
            $lesnonexpires+=DB::table('plan')->where('text_id',$text->id)->where('society_id',$soc)->where('accompli',0)->where('date',">=",$date_now)->count();
            $lesconformes+= DB::table('rules_conformite')->where('text_id',$text->id)->where('society_id',$soc)->where('isConforme',1)->count();
            $lesnonconformes+= DB::table('rules_conformite')->where('text_id',$text->id)->where('society_id',$soc)->where('isConforme',0)->count();
           
            $text->conformite=$conforme;
            $text->assign=$assign; 
            
        }
        dd($lesconformes);
        $total=$lesconformes+$lesnonconformes;
        $expiration=$lesexpires+$lesnonexpires;   
        return view('client.texts',['texts'=>$texts,'lesconformes'=>$lesconformes,'lesnonconformes'=>$lesnonconformes, 'total'=>$total,'lesexpires'=>$lesexpires,'lesnonexpires'=>$lesnonexpires,'expiration'=>$expiration]);
    }
    public function eng()
    {   $soc = DB::table('users')->where('id','=', session('Loggedclient'))->value('society_id');
        $suser_id=DB::table('users')->where('society_id','=', $soc)->where('profile','SUser')->value('id');
        $activity=DB::table('users_activities')->where('user_id',$suser_id)->pluck('activity_id');
        
        $texts=DB::table('text')->where('theme_id',3)->whereIn('activity_id', $activity)->get();
        
        $assigned=DB::table('text')->join('plan','text.id',"=",'plan.text_id')->where('plan.society_id',$soc)->where('plan_creator',$suser_id)->where('plan.user_id',session('Loggedclient'))->where('plan.accompli',0)->pluck('text_id','plan.id');
        $deja_evalue=DB::table('text')->join('plan','text.id',"=",'plan.text_id')->where('plan.society_id',$soc)->where('plan_creator',$suser_id)->where('plan.user_id',"!=",session('Loggedclient'))->where('plan.accompli',0)->pluck('text_id','plan.id');
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
            else{
                $conforme=1;
            }
            if(in_array($text->id, json_decode(json_encode($assigned), true))){
                $assign="Le plan d'actions de ce texte est assigné à vous";
            }
            elseif(in_array($text->id, json_decode(json_encode($deja_evalue), true))){
                $assign="Ce texte est déjà évalué par votre supérieur";
            }
            else{
                $assign="0";
            }
            $lesexpires+=DB::table('plan')->where('text_id',$text->id)->where('society_id',$soc)->where('accompli',0)->where('date',"<",$date_now)->count();
            $lesnonexpires+=DB::table('plan')->where('text_id',$text->id)->where('society_id',$soc)->where('accompli',0)->where('date',">=",$date_now)->count();
            $lesconformes+= DB::table('rules_conformite')->where('text_id',$text->id)->where('society_id',$soc)->where('isConforme',1)->count();
            $lesnonconformes+= DB::table('rules_conformite')->where('text_id',$text->id)->where('society_id',$soc)->where('isConforme',0)->count();
           
            $text->conformite=$conforme;
            $text->assign=$assign; 
          
        }
        
        $total=$lesconformes+$lesnonconformes;
        $expiration=$lesexpires+$lesnonexpires;   
        return view('client.texts',['texts'=>$texts,'lesconformes'=>$lesconformes,'lesnonconformes'=>$lesnonconformes, 'total'=>$total,'lesexpires'=>$lesexpires,'lesnonexpires'=>$lesnonexpires,'expiration'=>$expiration]);
    }
    public function qlt()
    {
        $soc = DB::table('users')->where('id','=', session('Loggedclient'))->value('society_id');
        $suser_id=DB::table('users')->where('society_id','=', $soc)->where('profile','SUser')->value('id');
        $activity=DB::table('users_activities')->where('user_id',$suser_id)->pluck('activity_id');
        $texts=DB::table('text')->where('theme_id',4)->whereIn('activity_id', $activity)->get();
        $assigned=DB::table('text')->join('plan','text.id',"=",'plan.text_id')->where('plan.society_id',$soc)->where('plan_creator',$suser_id)->where('plan.user_id',session('Loggedclient'))->where('plan.accompli',0)->pluck('text_id','plan.id');
        $deja_evalue=DB::table('text')->join('plan','text.id',"=",'plan.text_id')->where('plan.society_id',$soc)->where('plan_creator',$suser_id)->where('plan.user_id',"!=",session('Loggedclient'))->where('plan.accompli',0)->pluck('text_id','plan.id');
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
            else{
                $conforme=1;
            }
            if(in_array($text->id, json_decode(json_encode($assigned), true))){
                $assign="Le plan d'actions de ce texte est assigné à vous";
            }
            elseif(in_array($text->id, json_decode(json_encode($deja_evalue), true))){
                $assign="Ce texte est déjà évalué par votre supérieur";
            }
            else{
                $assign="0";
            }
            $lesexpires+=DB::table('plan')->where('text_id',$text->id)->where('society_id',$soc)->where('accompli',0)->where('date',"<",$date_now)->count();
            $lesnonexpires+=DB::table('plan')->where('text_id',$text->id)->where('society_id',$soc)->where('accompli',0)->where('date',">=",$date_now)->count();
            $lesconformes+= DB::table('rules_conformite')->where('text_id',$text->id)->where('society_id',$soc)->where('isConforme',1)->count();
            $lesnonconformes+= DB::table('rules_conformite')->where('text_id',$text->id)->where('society_id',$soc)->where('isConforme',0)->count();
           
            $text->conformite=$conforme;
            $text->assign=$assign; 
            
        }
        $total=$lesconformes+$lesnonconformes;
        $expiration=$lesexpires+$lesnonexpires;   
        return view('client.texts',['texts'=>$texts,'lesconformes'=>$lesconformes,'lesnonconformes'=>$lesnonconformes, 'total'=>$total,'lesexpires'=>$lesexpires,'lesnonexpires'=>$lesnonexpires,'expiration'=>$expiration]);
    }
    public function fnc()
    {
        $soc = DB::table('users')->where('id','=', session('Loggedclient'))->value('society_id');
        $suser_id=DB::table('users')->where('society_id','=', $soc)->where('profile','SUser')->value('id');
        $activity=DB::table('users_activities')->where('user_id',$suser_id)->pluck('activity_id');
        $texts=DB::table('text')->where('theme_id',5)->whereIn('activity_id', $activity)->get();
        $assigned=DB::table('text')->join('plan','text.id',"=",'plan.text_id')->where('plan.society_id',$soc)->where('plan_creator',$suser_id)->where('plan.user_id',session('Loggedclient'))->where('plan.accompli',0)->pluck('text_id','plan.id');
        $deja_evalue=DB::table('text')->join('plan','text.id',"=",'plan.text_id')->where('plan.society_id',$soc)->where('plan_creator',$suser_id)->where('plan.user_id',"!=",session('Loggedclient'))->where('plan.accompli',0)->pluck('text_id','plan.id');
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
            else{
                $conforme=1;
            }
            if(in_array($text->id, json_decode(json_encode($assigned), true))){
                $assign="Le plan d'actions de ce texte est assigné à vous";
            }
            elseif(in_array($text->id, json_decode(json_encode($deja_evalue), true))){
                $assign="Ce texte est déjà évalué par votre supérieur";
            }
            else{
                $assign="0";
            }
            $lesexpires+=DB::table('plan')->where('text_id',$text->id)->where('society_id',$soc)->where('accompli',0)->where('date',"<",$date_now)->count();
            $lesnonexpires+=DB::table('plan')->where('text_id',$text->id)->where('society_id',$soc)->where('accompli',0)->where('date',">=",$date_now)->count();
            $lesconformes+= DB::table('rules_conformite')->where('text_id',$text->id)->where('society_id',$soc)->where('isConforme',1)->count();
            $lesnonconformes+= DB::table('rules_conformite')->where('text_id',$text->id)->where('society_id',$soc)->where('isConforme',0)->count();
           
            $text->conformite=$conforme;
            $text->assign=$assign; 
            
        }
        $total=$lesconformes+$lesnonconformes;
        $expiration=$lesexpires+$lesnonexpires;   
        return view('client.texts',['texts'=>$texts,'lesconformes'=>$lesconformes,'lesnonconformes'=>$lesnonconformes, 'total'=>$total,'lesexpires'=>$lesexpires,'lesnonexpires'=>$lesnonexpires,'expiration'=>$expiration]);
    }
    public function fsq()
    {   
        $soc = DB::table('users')->where('id','=', session('Loggedclient'))->value('society_id');
        $suser_id=DB::table('users')->where('society_id','=', $soc)->where('profile','SUser')->value('id');
        $activity=DB::table('users_activities')->where('user_id',$suser_id)->pluck('activity_id');
        $texts=DB::table('text')->where('theme_id',6)->whereIn('activity_id', $activity)->get();
        $assigned=DB::table('text')->join('plan','text.id',"=",'plan.text_id')->where('plan.society_id',$soc)->where('plan_creator',$suser_id)->where('plan.user_id',session('Loggedclient'))->where('plan.accompli',0)->pluck('text_id','plan.id');
        $deja_evalue=DB::table('text')->join('plan','text.id',"=",'plan.text_id')->where('plan.society_id',$soc)->where('plan_creator',$suser_id)->where('plan.user_id',"!=",session('Loggedclient'))->where('plan.accompli',0)->pluck('text_id','plan.id');
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
            else{
                $conforme=1;
            }
            if(in_array($text->id, json_decode(json_encode($assigned), true))){
                $assign="Le plan d'actions de ce texte est assigné à vous";
            }
            elseif(in_array($text->id, json_decode(json_encode($deja_evalue), true))){
                $assign="Ce texte est déjà évalué par votre supérieur";
            }
            else{
                $assign="0";
            }
            $lesexpires+=DB::table('plan')->where('text_id',$text->id)->where('society_id',$soc)->where('accompli',0)->where('date',"<",$date_now)->count();
            $lesnonexpires+=DB::table('plan')->where('text_id',$text->id)->where('society_id',$soc)->where('accompli',0)->where('date',">=",$date_now)->count();
            $lesconformes+= DB::table('rules_conformite')->where('text_id',$text->id)->where('society_id',$soc)->where('isConforme',1)->count();
            $lesnonconformes+= DB::table('rules_conformite')->where('text_id',$text->id)->where('society_id',$soc)->where('isConforme',0)->count();
           
            $text->conformite=$conforme;
            $text->assign=$assign; 
            
        }
        $total=$lesconformes+$lesnonconformes;
        $expiration=$lesexpires+$lesnonexpires;   
        return view('client.texts',['texts'=>$texts,'lesconformes'=>$lesconformes,'lesnonconformes'=>$lesnonconformes, 'total'=>$total,'lesexpires'=>$lesexpires,'lesnonexpires'=>$lesnonexpires,'expiration'=>$expiration]);
    }
    public function lois($id)
    {   $soc = DB::table('users')->where('id','=', session('Loggedclient'))->value('society_id');
        $articles=DB::table('article')->where('text_id',$id)->pluck('id','description');
        $rules=DB::table('rules')->whereIn('article_id',$articles)->pluck('content','article_id');
        $rules_id=DB::table('rules')->whereIn('article_id',$articles)->pluck('id','article_id');
        $file_bo=DB::table('text')->join('bos','text.bo_id',"=",'bos.id')->where('text.id',$id)->value('bos.file');
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
        
             
             
         
        return view('client.loi',['rules'=>$rules,'category'=>$category,'name'=>$name,'resume'=>$description,'sanctions'=>$sanctions,'definitions'=>$definition,'status'=>$status,'articles'=>$articles,'rule_id'=>$rules_id,'def_id'=>$def_id,'sanc_id'=>$sanc_id,'rule_id_f'=>$rule_id_f,'file_bo'=>$file_bo]);
    }
    public function conformite(Request $request){
        
       $array=array();
       $soc = DB::table('users')->where('id','=', session('Loggedclient'))->value('society_id');
       
       foreach($request->request as $k=>$v){
             $array[$k]=$v;
       }
       unset($array["_token"]);
    $s=0;
    $text_id="";
    foreach($array as $k=>$v){
        if($v=="1"){$s+=1;
        }
        $text_id=DB::table('rules')->where('id',$k)->value('text_id');
        $update=DB::table('rules_conformite')->updateOrInsert(['society_id'=> $soc,'rule_id'=> $k,'text_id'=> $text_id],['isConforme'=>$v]);
        $update_text=DB::table('text_plan')->updateOrInsert(['society_id'=>$soc,'text_id'=> $text_id],['plan'=>0]);

    }  
    
    $r=count($array);
    if($s=="$r"){
        $update_text=DB::table('text_plan')->updateOrInsert(['society_id'=>$soc,'text_id'=> $text_id],['plan'=>2]); 
    }
    return redirect()->back()->with('etat','Votre évaluation est enregistrée');
    }
     
     public function envactionplan()
     {
        $soc = DB::table('users')->where('id','=', session('Loggedclient'))->value('society_id');
        $suser_id=DB::table('users')->where('society_id','=', $soc)->where('profile','SUser')->value('id');
        $activity=DB::table('users_activities')->where('user_id',$suser_id)->pluck('activity_id');
        $texts=DB::table('text')->join('text_plan','text.id','=','text_plan.text_id')->where('text_plan.society_id',$soc)->where('text_plan.plan',0)->where('text.theme_id',1)->whereIn('text.activity_id', $activity)->pluck('text.description','text.id');
        
         $rules=array();
         $texts_plan_id=DB::table('text_plan')->where('plan',1)->where('society_id',$soc)->pluck('text_id');
    
         $texts_plan=DB::table('text')->join('plan','plan.text_id',"=",'text.id')->where('plan.society_id',$soc)->whereIn('text.activity_id', $activity)->whereIn('plan.text_id',$texts_plan_id )->where('text.theme_id',1)
         ->where('plan.plan_creator',session('Loggedclient'))
         ->where('plan.user_id',session('Loggedclient'))
         ->where('plan.accompli',0)
         ->select('plan.id','plan.content','plan.title','plan.status','plan.user_id','plan.type','plan.criticality','plan.date','plan.text_id','text.description')
         ->get();
        
         for($i=0;$i<count($texts_plan);$i++){
            
             $user_first=DB::table('users')->where('id',$texts_plan[$i]->user_id)->value('first_name');
             $user_last=DB::table('users')->where('id',$texts_plan[$i]->user_id)->value('last_name');
             $creator_first=DB::table('users')->where('id',session('Loggedclient'))->value('first_name');
             $creator_last=DB::table('users')->where('id',session('Loggedclient'))->value('last_name');
             $texts_plan[$i]->user_first= $user_first;
             $texts_plan[$i]->user_last= $user_last;
             $texts_plan[$i]->creator_first= $creator_first;
             $texts_plan[$i]->creator_last= $creator_last;
            

         }
         $texts_plan_new=DB::table('text')->join('plan','plan.text_id',"=",'text.id')->where('plan.society_id',$soc)->whereIn('text.activity_id', $activity)->whereIn('plan.text_id',$texts_plan_id )->where('text.theme_id',1)
         ->where('plan.plan_creator',"!=",session('Loggedclient'))
         ->where('plan.user_id',session('Loggedclient'))
         ->where('plan.accompli',0)
         ->select('plan.id','plan.content','plan.title','plan.status','plan.user_id','plan.type','plan.criticality','plan.date','plan.text_id','text.description','plan.plan_creator')
         ->get();
            for($i=0;$i<count($texts_plan_new);$i++){
            
            $user_first=DB::table('users')->where('id',$texts_plan_new[$i]->user_id)->value('first_name');
            $user_last=DB::table('users')->where('id',$texts_plan_new[$i]->user_id)->value('last_name');
            $creator_first=DB::table('users')->where('id',$texts_plan_new[$i]->plan_creator)->value('first_name');
            $creator_last=DB::table('users')->where('id',$texts_plan_new[$i]->plan_creator)->value('last_name');
            $texts_plan_new[$i]->user_first= $user_first;
            $texts_plan_new[$i]->user_last= $user_last;
            $texts_plan_new[$i]->creator_first= $creator_first;
            $texts_plan_new[$i]->creator_last= $creator_last;
           

        } 
        
       
        $exigences=array();
        foreach($texts as $k=>$v){
            $exigences[$k]=DB::table('rules')->join('rules_conformite','rules.id',"=",'rules_conformite.rule_id')->where('rules_conformite.society_id',$soc)->where([['rules_conformite.text_id',"=",$k],['rules_conformite.isConforme',"=",0]])->pluck('rules.content');
         }
        
       /*  $u=DB::table('users')->join('user_themes','users.id',"=","user_themes.user_id")->where('user_themes.theme_id',1)->where('users.society_id',$soc)->where('users.profile',"User")->select('users.last_name','users.first_name','users.id')->get(); */
         
        
        return view('client.actionplan',['texts'=>$texts,'exigences'=>$exigences,'texts_plan'=>$texts_plan,'theme_plan'=>1,'texts_plan_new'=>$texts_plan_new]);
     }
     public function hsstactionplan()
     {
        $soc = DB::table('users')->where('id','=', session('Loggedclient'))->value('society_id');
        $suser_id=DB::table('users')->where('society_id','=', $soc)->where('profile','SUser')->value('id');
        $activity=DB::table('users_activities')->where('user_id',$suser_id)->pluck('activity_id');
        $texts=DB::table('text')->join('text_plan','text.id','=','text_plan.text_id')
        ->where('text_plan.society_id',$soc)->where('text_plan.plan',0)->where('text.theme_id',2)->whereIn('text.activity_id', $activity)->pluck('text.description','text.id');
        
         $rules=array();
         $texts_plan_id=DB::table('text_plan')->where('plan',1)->where('society_id',$soc)->pluck('text_id');
    
         $texts_plan=DB::table('text')->join('plan','plan.text_id',"=",'text.id')->where('plan.society_id',$soc)->whereIn('text.activity_id', $activity)->whereIn('plan.text_id',$texts_plan_id )->where('text.theme_id',2)
         ->where('plan.plan_creator',session('Loggedclient'))
         ->where('plan.user_id',session('Loggedclient'))
         ->where('plan.accompli',0)
         ->select('plan.id','plan.content','plan.title','plan.status','plan.user_id','plan.type','plan.criticality','plan.date','plan.text_id','text.description')
         ->get();
        
         for($i=0;$i<count($texts_plan);$i++){
            
             $user_first=DB::table('users')->where('id',$texts_plan[$i]->user_id)->value('first_name');
             $user_last=DB::table('users')->where('id',$texts_plan[$i]->user_id)->value('last_name');
             $creator_first=DB::table('users')->where('id',session('Loggedclient'))->value('first_name');
             $creator_last=DB::table('users')->where('id',session('Loggedclient'))->value('last_name');
             $texts_plan[$i]->user_first= $user_first;
             $texts_plan[$i]->user_last= $user_last;
             $texts_plan[$i]->creator_first= $creator_first;
             $texts_plan[$i]->creator_last= $creator_last;
            

         }
         $texts_plan_new=DB::table('text')->join('plan','plan.text_id',"=",'text.id')->where('plan.society_id',$soc)->whereIn('text.activity_id', $activity)->whereIn('plan.text_id',$texts_plan_id )->where('text.theme_id',2)
         ->where('plan.plan_creator',"!=",session('Loggedclient'))
         ->where('plan.user_id',session('Loggedclient'))
         ->where('plan.accompli',0)
         ->select('plan.id','plan.content','plan.title','plan.status','plan.user_id','plan.type','plan.criticality','plan.date','plan.text_id','text.description','plan.plan_creator')
         ->get();
            for($i=0;$i<count($texts_plan_new);$i++){
            
            $user_first=DB::table('users')->where('id',$texts_plan_new[$i]->user_id)->value('first_name');
            $user_last=DB::table('users')->where('id',$texts_plan_new[$i]->user_id)->value('last_name');
            $creator_first=DB::table('users')->where('id',$texts_plan_new[$i]->plan_creator)->value('first_name');
            $creator_last=DB::table('users')->where('id',$texts_plan_new[$i]->plan_creator)->value('last_name');
            $texts_plan_new[$i]->user_first= $user_first;
            $texts_plan_new[$i]->user_last= $user_last;
            $texts_plan_new[$i]->creator_first= $creator_first;
            $texts_plan_new[$i]->creator_last= $creator_last;
           

        } 
         
        
       
        $exigences=array();
        foreach($texts as $k=>$v){
            $exigences[$k]=DB::table('rules')->join('rules_conformite','rules.id',"=",'rules_conformite.rule_id')->where('rules_conformite.society_id',$soc)->where([['rules_conformite.text_id',"=",$k],['rules_conformite.isConforme',"=",0]])->pluck('rules.content');
         }
        
       /*  $u=DB::table('users')->join('user_themes','users.id',"=","user_themes.user_id")->where('user_themes.theme_id',1)->where('users.society_id',$soc)->where('users.profile',"User")->select('users.last_name','users.first_name','users.id')->get(); */
         
        
        return view('client.actionplan',['texts'=>$texts,'exigences'=>$exigences,'texts_plan'=>$texts_plan,'theme_plan'=>2,'texts_plan_new'=>$texts_plan_new]);
     }
     public function engactionplan()
     {
        $soc = DB::table('users')->where('id','=', session('Loggedclient'))->value('society_id');
        $suser_id=DB::table('users')->where('society_id','=', $soc)->where('profile','SUser')->value('id');
        $activity=DB::table('users_activities')->where('user_id',$suser_id)->pluck('activity_id');
        $texts=DB::table('text')->join('text_plan','text.id','=','text_plan.text_id')->where('text_plan.society_id',$soc)->where('text_plan.plan',0)->where('text.theme_id',3)->whereIn('text.activity_id', $activity)->pluck('text.description','text.id');
        
         $rules=array();
         $texts_plan_id=DB::table('text_plan')->where('plan',1)->where('society_id',$soc)->pluck('text_id');
    
         $texts_plan_new=DB::table('text')->join('plan','plan.text_id',"=",'text.id')->where('plan.society_id',$soc)->whereIn('text.activity_id', $activity)->whereIn('plan.text_id',$texts_plan_id )->where('text.theme_id',3)
         ->where('plan.plan_creator',"!=",session('Loggedclient'))
         ->where('plan.user_id',session('Loggedclient'))
         ->where('plan.accompli',0)
         ->select('plan.id','plan.content','plan.title','plan.status','plan.user_id','plan.type','plan.criticality','plan.date','plan.text_id','text.description','plan.plan_creator')
         ->get();
         $texts_plan=DB::table('text')->join('plan','plan.text_id',"=",'text.id')->where('plan.society_id',$soc)->whereIn('text.activity_id', $activity)->whereIn('plan.text_id',$texts_plan_id )->where('text.theme_id',3)
         
         ->where('plan.plan_creator',session('Loggedclient'))
         ->where('plan.accompli',0)
         ->select('plan.id','plan.content','plan.title','plan.status','plan.user_id','plan.type','plan.criticality','plan.date','plan.text_id','text.description')
         ->get();
         
        
         for($i=0;$i<count($texts_plan);$i++){
            
             $user_first=DB::table('users')->where('id',$texts_plan[$i]->user_id)->value('first_name');
             $user_last=DB::table('users')->where('id',$texts_plan[$i]->user_id)->value('last_name');
             $creator_first=DB::table('users')->where('id',session('Loggedclient'))->value('first_name');
             $creator_last=DB::table('users')->where('id',session('Loggedclient'))->value('last_name');
             $texts_plan[$i]->user_first= $user_first;
             $texts_plan[$i]->user_last= $user_last;
             $texts_plan[$i]->creator_first= $creator_first;
             $texts_plan[$i]->creator_last= $creator_last;
            

         } 
         
         for($i=0;$i<count($texts_plan_new);$i++){
            
            $user_first=DB::table('users')->where('id',$texts_plan_new[$i]->user_id)->value('first_name');
            $user_last=DB::table('users')->where('id',$texts_plan_new[$i]->user_id)->value('last_name');
            $creator_first=DB::table('users')->where('id',$texts_plan_new[$i]->plan_creator)->value('first_name');
            $creator_last=DB::table('users')->where('id',$texts_plan_new[$i]->plan_creator)->value('last_name');
            $texts_plan_new[$i]->user_first= $user_first;
            $texts_plan_new[$i]->user_last= $user_last;
            $texts_plan_new[$i]->creator_first= $creator_first;
            $texts_plan_new[$i]->creator_last= $creator_last;
           

        } 
        
        
       
        $exigences=array();
        foreach($texts as $k=>$v){
            $exigences[$k]=DB::table('rules')->join('rules_conformite','rules.id',"=",'rules_conformite.rule_id')->where('rules_conformite.society_id',$soc)->where([['rules_conformite.text_id',"=",$k],['rules_conformite.isConforme',"=",0]])->pluck('rules.content');
         }
        
       /*  $u=DB::table('users')->join('user_themes','users.id',"=","user_themes.user_id")->where('user_themes.theme_id',1)->where('users.society_id',$soc)->where('users.profile',"User")->select('users.last_name','users.first_name','users.id')->get(); */
         
        
        return view('client.actionplan',['texts'=>$texts,'exigences'=>$exigences,'texts_plan'=>$texts_plan,'theme_plan'=>3,'texts_plan_new'=>$texts_plan_new]);
     }
     public function qltactionplan()
     {
        $soc = DB::table('users')->where('id','=', session('Loggedclient'))->value('society_id');
        $suser_id=DB::table('users')->where('society_id','=', $soc)->where('profile','SUser')->value('id');
        $activity=DB::table('users_activities')->where('user_id',$suser_id)->pluck('activity_id');
        $texts=DB::table('text')->join('text_plan','text.id','=','text_plan.text_id')->where('text_plan.society_id',$soc)->where('text_plan.plan',0)->where('text.theme_id',4)->whereIn('text.activity_id', $activity)->pluck('text.description','text.id');
        
         $rules=array();
         $texts_plan_id=DB::table('text_plan')->where('plan',1)->where('society_id',$soc)->pluck('text_id');
    
         $texts_plan=DB::table('text')->join('plan','plan.text_id',"=",'text.id')->where('plan.society_id',$soc)->whereIn('text.activity_id', $activity)->whereIn('plan.text_id',$texts_plan_id )->where('text.theme_id',4)
         ->where('plan.plan_creator',session('Loggedclient'))
         ->where('plan.user_id',session('Loggedclient'))
         ->where('plan.accompli',0)
         ->select('plan.id','plan.content','plan.title','plan.status','plan.user_id','plan.type','plan.criticality','plan.date','plan.text_id','text.description')
         ->get();
        
         for($i=0;$i<count($texts_plan);$i++){
            
             $user_first=DB::table('users')->where('id',$texts_plan[$i]->user_id)->value('first_name');
             $user_last=DB::table('users')->where('id',$texts_plan[$i]->user_id)->value('last_name');
             $creator_first=DB::table('users')->where('id',session('Loggedclient'))->value('first_name');
             $creator_last=DB::table('users')->where('id',session('Loggedclient'))->value('last_name');
             $texts_plan[$i]->user_first= $user_first;
             $texts_plan[$i]->user_last= $user_last;
             $texts_plan[$i]->creator_first= $creator_first;
             $texts_plan[$i]->creator_last= $creator_last;
            

         }
         
         $texts_plan_new=DB::table('text')->join('plan','plan.text_id',"=",'text.id')->where('plan.society_id',$soc)->whereIn('text.activity_id', $activity)->whereIn('plan.text_id',$texts_plan_id )->where('text.theme_id',2)
         ->where('plan.plan_creator',"!=",session('Loggedclient'))
         ->where('plan.user_id',session('Loggedclient'))
         ->where('plan.accompli',0)
         ->select('plan.id','plan.content','plan.title','plan.status','plan.user_id','plan.type','plan.criticality','plan.date','plan.text_id','text.description','plan.plan_creator')
         ->get();
            for($i=0;$i<count($texts_plan_new);$i++){
            
            $user_first=DB::table('users')->where('id',$texts_plan_new[$i]->user_id)->value('first_name');
            $user_last=DB::table('users')->where('id',$texts_plan_new[$i]->user_id)->value('last_name');
            $creator_first=DB::table('users')->where('id',$texts_plan_new[$i]->plan_creator)->value('first_name');
            $creator_last=DB::table('users')->where('id',$texts_plan_new[$i]->plan_creator)->value('last_name');
            $texts_plan_new[$i]->user_first= $user_first;
            $texts_plan_new[$i]->user_last= $user_last;
            $texts_plan_new[$i]->creator_first= $creator_first;
            $texts_plan_new[$i]->creator_last= $creator_last;
           

        } 
       
        $exigences=array();
        foreach($texts as $k=>$v){
            $exigences[$k]=DB::table('rules')->join('rules_conformite','rules.id',"=",'rules_conformite.rule_id')->where('rules_conformite.society_id',$soc)->where([['rules_conformite.text_id',"=",$k],['rules_conformite.isConforme',"=",0]])->pluck('rules.content');
         }
        
       /*  $u=DB::table('users')->join('user_themes','users.id',"=","user_themes.user_id")->where('user_themes.theme_id',1)->where('users.society_id',$soc)->where('users.profile',"User")->select('users.last_name','users.first_name','users.id')->get(); */
         
        
        return view('client.actionplan',['texts'=>$texts,'exigences'=>$exigences,'texts_plan'=>$texts_plan,'theme_plan'=>4,'texts_plan_new'=>$texts_plan_new]);
     }
     public function fncactionplan()
     {
        $soc = DB::table('users')->where('id','=', session('Loggedclient'))->value('society_id');
        $suser_id=DB::table('users')->where('society_id','=', $soc)->where('profile','SUser')->value('id');
        $activity=DB::table('users_activities')->where('user_id',$suser_id)->pluck('activity_id');
        $texts=DB::table('text')->join('text_plan','text.id','=','text_plan.text_id')->where('text_plan.society_id',$soc)->where('text_plan.plan',0)->where('text.theme_id',5)->whereIn('text.activity_id', $activity)->pluck('text.description','text.id');
        
         $rules=array();
         $texts_plan_id=DB::table('text_plan')->where('plan',1)->where('society_id',$soc)->pluck('text_id');
    
         $texts_plan=DB::table('text')->join('plan','plan.text_id',"=",'text.id')->where('plan.society_id',$soc)->whereIn('text.activity_id', $activity)->whereIn('plan.text_id',$texts_plan_id )->where('text.theme_id',5)
         ->where('plan.plan_creator',session('Loggedclient'))
         ->where('plan.user_id',session('Loggedclient'))
         ->where('plan.accompli',0)
         ->select('plan.id','plan.content','plan.title','plan.status','plan.user_id','plan.type','plan.criticality','plan.date','plan.text_id','text.description')
         ->get();
        
         for($i=0;$i<count($texts_plan);$i++){
            
             $user_first=DB::table('users')->where('id',$texts_plan[$i]->user_id)->value('first_name');
             $user_last=DB::table('users')->where('id',$texts_plan[$i]->user_id)->value('last_name');
             $creator_first=DB::table('users')->where('id',session('Loggedclient'))->value('first_name');
             $creator_last=DB::table('users')->where('id',session('Loggedclient'))->value('last_name');
             $texts_plan[$i]->user_first= $user_first;
             $texts_plan[$i]->user_last= $user_last;
             $texts_plan[$i]->creator_first= $creator_first;
             $texts_plan[$i]->creator_last= $creator_last;
            

         }
         
         $texts_plan_new=DB::table('text')->join('plan','plan.text_id',"=",'text.id')->where('plan.society_id',$soc)->whereIn('text.activity_id', $activity)->whereIn('plan.text_id',$texts_plan_id )->where('text.theme_id',2)
         ->where('plan.plan_creator',"!=",session('Loggedclient'))
         ->where('plan.user_id',session('Loggedclient'))
         ->where('plan.accompli',0)
         ->select('plan.id','plan.content','plan.title','plan.status','plan.user_id','plan.type','plan.criticality','plan.date','plan.text_id','text.description','plan.plan_creator')
         ->get();
            for($i=0;$i<count($texts_plan_new);$i++){
            
            $user_first=DB::table('users')->where('id',$texts_plan_new[$i]->user_id)->value('first_name');
            $user_last=DB::table('users')->where('id',$texts_plan_new[$i]->user_id)->value('last_name');
            $creator_first=DB::table('users')->where('id',$texts_plan_new[$i]->plan_creator)->value('first_name');
            $creator_last=DB::table('users')->where('id',$texts_plan_new[$i]->plan_creator)->value('last_name');
            $texts_plan_new[$i]->user_first= $user_first;
            $texts_plan_new[$i]->user_last= $user_last;
            $texts_plan_new[$i]->creator_first= $creator_first;
            $texts_plan_new[$i]->creator_last= $creator_last;
           

        } 
       
        $exigences=array();
        foreach($texts as $k=>$v){
            $exigences[$k]=DB::table('rules')->join('rules_conformite','rules.id',"=",'rules_conformite.rule_id')->where('rules_conformite.society_id',$soc)->where([['rules_conformite.text_id',"=",$k],['rules_conformite.isConforme',"=",0]])->pluck('rules.content');
         }
        
       /*  $u=DB::table('users')->join('user_themes','users.id',"=","user_themes.user_id")->where('user_themes.theme_id',1)->where('users.society_id',$soc)->where('users.profile',"User")->select('users.last_name','users.first_name','users.id')->get(); */
         
        
        return view('client.actionplan',['texts'=>$texts,'exigences'=>$exigences,'texts_plan'=>$texts_plan,'theme_plan'=>5,'texts_plan_new'=>$texts_plan_new]);
     }
     public function fsqactionplan()
     {   
        $soc = DB::table('users')->where('id','=', session('Loggedclient'))->value('society_id');
        $suser_id=DB::table('users')->where('society_id','=', $soc)->where('profile','SUser')->value('id');
        $activity=DB::table('users_activities')->where('user_id',$suser_id)->pluck('activity_id');
        $texts=DB::table('text')->join('text_plan','text.id','=','text_plan.text_id')->where('text_plan.society_id',$soc)->where('text_plan.plan',0)->where('text.theme_id',6)->whereIn('text.activity_id', $activity)->pluck('text.description','text.id');
        
         $rules=array();
         $texts_plan_id=DB::table('text_plan')->where('plan',1)->where('society_id',$soc)->pluck('text_id');
    
         $texts_plan=DB::table('text')->join('plan','plan.text_id',"=",'text.id')->where('plan.society_id',$soc)->whereIn('text.activity_id', $activity)->whereIn('plan.text_id',$texts_plan_id )->where('text.theme_id',6)
         ->where('plan.plan_creator',session('Loggedclient'))
         ->where('plan.user_id',session('Loggedclient'))
         ->where('plan.accompli',0)
         ->select('plan.id','plan.content','plan.title','plan.status','plan.user_id','plan.type','plan.criticality','plan.date','plan.text_id','text.description')
         ->get();
        
         for($i=0;$i<count($texts_plan);$i++){
            
             $user_first=DB::table('users')->where('id',$texts_plan[$i]->user_id)->value('first_name');
             $user_last=DB::table('users')->where('id',$texts_plan[$i]->user_id)->value('last_name');
             $creator_first=DB::table('users')->where('id',session('Loggedclient'))->value('first_name');
             $creator_last=DB::table('users')->where('id',session('Loggedclient'))->value('last_name');
             $texts_plan[$i]->user_first= $user_first;
             $texts_plan[$i]->user_last= $user_last;
             $texts_plan[$i]->creator_first= $creator_first;
             $texts_plan[$i]->creator_last= $creator_last;
            

         }
         
         $texts_plan_new=DB::table('text')->join('plan','plan.text_id',"=",'text.id')->where('plan.society_id',$soc)->whereIn('text.activity_id', $activity)->whereIn('plan.text_id',$texts_plan_id )->where('text.theme_id',2)
         ->where('plan.plan_creator',"!=",session('Loggedclient'))
         ->where('plan.user_id',session('Loggedclient'))
         ->where('plan.accompli',0)
         ->select('plan.id','plan.content','plan.title','plan.status','plan.user_id','plan.type','plan.criticality','plan.date','plan.text_id','text.description','plan.plan_creator')
         ->get();
            for($i=0;$i<count($texts_plan_new);$i++){
            
            $user_first=DB::table('users')->where('id',$texts_plan_new[$i]->user_id)->value('first_name');
            $user_last=DB::table('users')->where('id',$texts_plan_new[$i]->user_id)->value('last_name');
            $creator_first=DB::table('users')->where('id',$texts_plan_new[$i]->plan_creator)->value('first_name');
            $creator_last=DB::table('users')->where('id',$texts_plan_new[$i]->plan_creator)->value('last_name');
            $texts_plan_new[$i]->user_first= $user_first;
            $texts_plan_new[$i]->user_last= $user_last;
            $texts_plan_new[$i]->creator_first= $creator_first;
            $texts_plan_new[$i]->creator_last= $creator_last;
           

        } 
       
        $exigences=array();
        foreach($texts as $k=>$v){
            $exigences[$k]=DB::table('rules')->join('rules_conformite','rules.id',"=",'rules_conformite.rule_id')->where('rules_conformite.society_id',$soc)->where([['rules_conformite.text_id',"=",$k],['rules_conformite.isConforme',"=",0]])->pluck('rules.content');
         }
        
       /*  $u=DB::table('users')->join('user_themes','users.id',"=","user_themes.user_id")->where('user_themes.theme_id',1)->where('users.society_id',$soc)->where('users.profile',"User")->select('users.last_name','users.first_name','users.id')->get(); */
         
        
        return view('client.actionplan',['texts'=>$texts,'exigences'=>$exigences,'texts_plan'=>$texts_plan,'theme_plan'=>6,'texts_plan_new'=>$texts_plan_new]);
     } 

    /*  ------------------------------------------ */




    
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
        $soc = DB::table('users')->where('id','=', session('Loggedclient'))->value('society_id');

        $insert_plan=DB::table('plan')->insert([
            'title' => $request->title,
            'content' => $request->description,
            'user_id' => $request->user,
            'text_id' => $text_id,
            'plan_creator' => session('Loggedclient'),
            'type' => $request->type,
            'status' => $request->statut,
            'criticality' => $request->criticity,
            'date' => $request->date,
            'society_id' => $soc,
        ]);
        $insert_text=DB::table('text_plan')->where('text_id',$text_id)->where('society_id',$soc)->update([
            'plan' => 1]);

        
        $plan_infos=array('title'=>$request->title,'content' => $request->description,'type' => $request->type,
        'status' => $request->statut,'criticality' => $request->criticity,'date' => $request->date);
    
        
       return redirect()->back()->with('etat','enregistrement reussi');;
    }
    public function deleteplan(Request $request,$id)
    {    $text_id=DB::table('plan')->where('id',$id)->get('text_id');
        $soc = DB::table('users')->where('id','=', session('Loggedclient'))->value('society_id');
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
            return redirect()->back()->with('dsuccess','Le plan selectionné est modifié.');
        }else{
            return redirect()->back()->with('dfail','Erreur! Réessayer la modification');
        }
    }
    public function updateplanpage(Request $request,$id,$theme_plan)
    {
        
        $soc = DB::table('users')->where('id','=', session('Loggedclient'))->value('society_id');
       
        $text_id=DB::table('plan')->where('id',$id)->where('society_id',$soc)->where('plan_creator',session('Loggedclient'))->value('text_id');
        $exigences=DB::table('rules')->join('rules_conformite','rules.id',"=",'rules_conformite.rule_id')->where('rules_conformite.society_id',$soc)->where([['rules.text_id',"=",$text_id],['rules_conformite.isConforme',"=",0]])->pluck('content');
        $updateinfo=DB::table('plan')->select('title', 'content', 'type', 'status', 'criticality', 'date')->find($id);
        return view('client.updateplane',['updateinfo'=>$updateinfo,'exigences'=>$exigences,'id'=>$id]);
    }
    public function actionplanaccompli($plan_id){
        $soc = DB::table('users')->where('id','=', session('Loggedclient'))->value('society_id');
        $text_id=DB::table('plan')->where('id',$plan_id)->value('text_id');
        $confirme=DB::table('rules_conformite')->where('text_id',$text_id)->where('society_id',$soc)->pluck('isConforme','id');
        foreach ($confirme as $key => $value) {
            DB::table('rules_conformite')->where('id',$key)->update(['isConforme'=>1]);
        }
       
        $deleted=DB::table('plan')->where('id',$plan_id)->update(['accompli'=>1]);
        return redirect()->back();
    }


 
}
