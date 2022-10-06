<?php
namespace App\Http\Controllers;
use App\Models\users;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use App\User;
  
class ChangePasswordController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required','same:password_confirmation'],
            'password_confirmation' => ['required'],
        ]);
        if(session()->has('LoggedUser')){
            $verif=users::find(users::where('id','=', session('LoggedUser'))->select('id')->first()['id'])->update(['password'=> Hash::make($request->new_password)]);
        }
        if(session()->has('LoggedSUser')){
            $verif=users::find(users::where('id','=', session('LoggedSUser'))->select('id')->first()['id'])->update(['password'=> Hash::make($request->new_password)]);
        }
        if(session()->has('Loggedclient')){
            $verif=users::find(users::where('id','=', session('Loggedclient'))->select('id')->first()['id'])->update(['password'=> Hash::make($request->new_password)]);
        }
        if($verif){
        return redirect()->back()->with('dsuccess','Le mot de passe est changé avec succés .');
        }
        else{
            return redirect()->back()->with('dfail','Erreur! Réessayer le  changement du mot de passe .');
        }
    }
   
}