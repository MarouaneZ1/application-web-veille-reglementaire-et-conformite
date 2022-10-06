<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class EdituserprofileController extends Controller
{
/*   public function society(){
    $society_id = DB::table('users')->where('id','=', session('Logged'))->value('society_id');
    $info=DB::table('societies')->where('id',$society_id)->get();
    if($info){
      return view('client.profile.societe',['info'=>$info]); 
    }
    return redirect('/userprofile')->with('fail','Erreur ! veuillez réessayer.. ');
  } */
  public function user(){
    $info = DB::table('users')->where('id','=', session('Loggedclient'))->select('email','first_name','last_name','Tel','CIN')->get();
    if($info){
      return view('client.profile.Employer',['info'=>$info]); 
    }
    return redirect('/userprofile')->with('failrespo','Erreur ! veuillez réessayer.. ');
  }
/*   public function edit(Request $r){
    $rules = [
        'Nomentreprise' => 'required|string|max:25',
        'ice' => 'required|string|max:15',
        'idf' => 'required|string|max:20',
        'rc' => 'required|string|max:20',
        'cnss' => 'required|string|max:20',
        'Fax' => 'required|string|max:25',
        'Email_contact'=> 'required|email|string',
        'Tel'=> 'required|max:15',
        'Npatente'=>'required|numeric',
        'Adresse_entreprise'=>'required',
        'Nom_Contact'=>'required',
        'Telephone_du_Contact'=>'required|max:15',
        
    ];

    $customMessages = [
        'required' => 'Le champ :attribute est requis.',
        'email' => "L'email est incorrect.",
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
        'Npatente'=>'N° Patente',
        'cin'=>'CIN',
        'ice'=>'ICE',
        'idf'=>'IF',
        'rc'=>'RC',
        'cnss'=>'CNSS'

        
    ];
   
    $r->validate($rules, $customMessages,$attr);
    $return=DB::table('societies')->update([
      'name'=>$r->Nomentreprise,
      'adresse'=>$r->Adresse_entreprise,
      'tel'=>$r->Tel,
      'fax'=>$r->Fax,
      'contact_name'=>$r->Nom_Contact,
      'contact_tel'=>$r->Telephone_du_Contact,
      'contact_mail'=>$r->Email_contact,
      'patente'=>$r->Npatente,
      'ICE'=>$r->ice,
      'RC'=>$r->rc,
      'IDF'=>$r->idf,
      'CNSS'=>$r->cnss]);
      
    if($return){
      return redirect('/userprofile')->with('success',"les modifications ont bien été enregistrées");
    }
    return redirect('/userprofile')->with('fail','Vous avez rien modifié ! veuillez réessayer.. ');
}
 */

  public function edituser(Request $r){
    $rules = [
      'Nom' => 'required|string|max:25',
      'Prenom' => 'required|string|max:25',
      'Email'=> 'required|email|string',
      'Telephone'=> ['required','regex:@(\+212|0)([ \-_/]*)(\d[ \-_/]*){9}@'],
      'cin'=>'required|max:8'
    ];

    $customMessages = [
        'required' => 'Le champ :attribute est requis.',
        'email' => "L'email est incorrect.",
        'regex' => "Entrez un numero telephone valide.",
        "string" => "Vous devez entrer une chaîne de caractére.",
        "unique" => ":attribute existe deja.",
    ];
    $attr = ['cin'=>'CIN'];
   
    $r->validate($rules, $customMessages,$attr);
    $return=DB::table('users')->where('id',session('Loggedclient'))->update([
      'last_name'=>$r->Nom,
      'first_name'=>$r->Prenom,
      'email'=>$r->Email,
      'Tel'=>$r->Telephone,
      'CIN'=>$r->cin
    ]);
    if($return){
      return redirect('/userprofile')->with('successresp',"les modifications ont bien été enregistrées");
    }
    return redirect('/userprofile')->with('failresp','Vous avez rien modifié ! veuillez réessayer.. ');

  }
}

  
