<?php 
namespace App\Rules;
use App\Models\users;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Hash;
  
class MatchOldPassword implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {    if(session()->has('LoggedUser')){
        $p=users::where('id','=', session('LoggedUser'))->select('password')->first();
        }
        if(session()->has('LoggedSUser')){
            $p=users::where('id','=', session('LoggedSUser'))->select('password')->first();
        }
        if(session()->has('Loggedclient')){
            $p=users::where('id','=', session('Loggedclient'))->select('password')->first();
        }

        return Hash::check($value, $p['password']);
    }
   
    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "le :attribute n'est pas correct.";
    }
}

