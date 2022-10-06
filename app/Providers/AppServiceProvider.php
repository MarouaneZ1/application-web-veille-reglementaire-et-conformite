<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\users;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {   
        View::composer('client.*', function ($view) {
            $last_name= DB::table('users')->where('id',session('Loggedclient'))->value('last_name');
            $first_name= DB::table('users')->where('id',session('Loggedclient'))->value('first_name');
 
             $dataa = $last_name." ".$first_name;
             $view->with('dataa',$dataa);
         });
        View::composer('client.*', function ($view) {
            $data = ['LoggedUserInfo'=>users::where('id','=', session('Loggedclient'))->first()];
            $id=session('Loggedclient');
            $users= DB::table('users')
            ->where('id','=', $id)
            ->get();
            $id_user=$users[0]->id;
            $user_themes= DB::table('user_themes')->select('theme_id')->where('user_id','=', $id_user)->get();
            $nbr=count($user_themes);
            $array=array();
            for ($x = 0; $x <$nbr; $x++) {
                $array[$x]=$user_themes[$x]->theme_id;
            }
            $themes=array();
            foreach($array as $k=>$v) {
                $themes[$v]=ucwords(strtolower(DB::table('themes')->where('id','=', $v)->value('name')));
            }
            $view->with('themes',$themes);
        });
      
        View::composer('user_dashboard.*', function ($view) {
            $data = ['LoggedUserInfo'=>users::where('id','=', session('LoggedUser'))->first()];
            $view->with('data',$data);
        });
        
        View::composer('client.*', function ($view) {
            $url=array('/ENV','/HSST','/ENG','/QLT','/FNC','/FSQ');
            $view->with('url',$url);
        });
        View::composer('client.*', function ($view) {
            $icon=array('tree','hard-hat','bolt','check-circle','landmark','hand-holding-usd');
            $view->with('icon',$icon);
        });
        View::composer('client.*', function ($view) {
            $urls=array('ENV','HSST','ENG','QLT','FNC','FSQ');
            $view->with('urls',$urls);
        });
        View::composer('Suser.*', function ($view) {
         $urls=array('ENVS','HSSTS','ENGS','QLTS','FNCS','FSQS','SSynthese','SUtilisateurs');
         
            $view->with('urlsuser',$urls);
        });
        
        View::composer('client.*', function ($view) {
            $data = users::where('id','=', session('Loggedclient'))->first();
            $id=$data['id'];
            $users= DB::table('users')
            ->where('id','=', $id)
            ->get();
            $id_society = DB::table('users')->where('id','=', $id)->value('society_id');
            $societie= DB::table('societies')->where('id','=', "$id_society")->get();
            $societies=$societie[0];
            $view->with('societies',$societies);
        });
        /* kfdlkfldkf */
        View::composer('Suser.*', function ($view) {
            $data = ['LoggedUserInfo'=>users::where('id','=', session('LoggedSUser'))->first()];
            $id=session('LoggedSUser');
            $users= DB::table('users')
            ->where('id','=', $id)
            ->get();
            $id_user=$users[0]->id;
            $user_themes= DB::table('user_themes')->select('theme_id')->where('user_id','=', $id_user)->get();
            $nbr=count($user_themes);
            $array=array();
            for ($x = 0; $x <$nbr; $x++) {
                $array[$x]=$user_themes[$x]->theme_id;
            }
            $themes=array();
            foreach($array as $k=>$v) {
                $themes[$v]=ucwords(strtolower(DB::table('themes')->where('id','=', $v)->value('name')));
            }
            $view->with('themes',$themes);
        });
        View::composer('Suser.*', function ($view) {
            $soc = DB::table('users')->where('id','=', session('LoggedSUser'))->value('society_id');
            $evaluated = DB::table('text_plan')->where('society_id','=', $soc)->where('plan','=', 1)->select()->count();
            $notevaluated= DB::table('text_plan')->where('society_id','=', $soc)->where('plan','=', 0)->select()->count();
            $evaluation=array('evaluated'=>$evaluated,'notevaluated'=>$notevaluated);
            $view->with('evaluation',$evaluation);
        });
        View::composer('Suser.*', function ($view) {
            $soc = DB::table('users')->where('id','=', session('LoggedSUser'))->value('society_id');
            $conforme = DB::table('rules_conformite')->where('society_id','=', $soc)->where('isConforme','=', 1)->select()->count();
            $notconforme= DB::table('rules_conformite')->where('society_id','=', $soc)->where('isConforme','=', 0)->select()->count();
            $conformite=array('conforme'=> $conforme,'notconforme'=>$notconforme);
            $view->with('conformite',$conformite);
        });
        View::composer('Suser.*', function ($view) {
            $soc = DB::table('users')->where('id','=', session('LoggedSUser'))->value('society_id');
            $themes= DB::table('user_themes')->join('themes','themes.id',"=",'user_themes.theme_id')->where('user_id','=', session('LoggedSUser'))->pluck('themes.name','user_themes.theme_id');
            $themes_names=array();

            $theme_conformite=array();
            $theme_nonconformite=array();
            foreach($themes as $k=>$v){
                array_push($themes_names,$v);
                array_push( $theme_conformite,DB::table('rules_conformite')->join('text','text.id',"=",'rules_conformite.text_id')->where('text.theme_id',$k)->where('rules_conformite.society_id','=', $soc)->where('isConforme','=', 1)->select()->count());
                array_push($theme_nonconformite, DB::table('rules_conformite')->join('text','text.id',"=",'rules_conformite.text_id')->where('text.theme_id',$k)->where('rules_conformite.society_id','=', $soc)->where('isConforme','=', 0)->select()->count());
               
            }
            $domain=array($themes_names,$theme_conformite,$theme_nonconformite);
         
            
        /*     $conforme = DB::table('rules_conformite')->where('society_id','=', $soc)->where('isConforme','=', 1)->select()->count();
            $notconforme= DB::table('rules_conformite')->where('society_id','=', $soc)->where('isConforme','=', 0)->select()->count();
            $conformite=array('conforme'=> $conforme,'notconforme'=>$notconforme); */
            $view->with('domain',$domain);
        });
        View::composer('Suser.*', function ($view) {
            $soc = DB::table('users')->where('id','=', session('LoggedSUser'))->value('society_id');
            $themes= DB::table('user_themes')->join('themes','themes.id',"=",'user_themes.theme_id')->where('user_id','=', session('LoggedSUser'))->pluck('themes.name','user_themes.theme_id');
            $theme_nonconformite=array();
            foreach($themes as $k=>$v){
                $theme_nonconformite[$v]= DB::table('rules_conformite')->join('text','text.id',"=",'rules_conformite.text_id')->where('text.theme_id',$k)->where('rules_conformite.society_id','=', $soc)->where('isConforme','=', 0)->select()->count();
               
            }
            
        /*     $conforme = DB::table('rules_conformite')->where('society_id','=', $soc)->where('isConforme','=', 1)->select()->count();
            $notconforme= DB::table('rules_conformite')->where('society_id','=', $soc)->where('isConforme','=', 0)->select()->count();
            $conformite=array('conforme'=> $conforme,'notconforme'=>$notconforme); */
            $view->with('theme_nonconformite',$theme_nonconformite);
        });
        View::composer('client.*', function ($view) {
            $soc = DB::table('users')->where('id','=', session('Loggedclient'))->value('society_id');
            $evaluated = DB::table('text_plan')->where('society_id','=', $soc)->where('plan','=', 1)->select()->count();
            $notevaluated= DB::table('text_plan')->where('society_id','=', $soc)->where('plan','=', 0)->select()->count();
            $evaluation=array('evaluated'=>$evaluated,'notevaluated'=>$notevaluated);
            $view->with('evaluation',$evaluation);
        });
        View::composer('client.*', function ($view) {
            $soc = DB::table('users')->where('id','=', session('Loggedclient'))->value('society_id');
            $conforme = DB::table('rules_conformite')->where('society_id','=', $soc)->where('isConforme','=', 1)->select()->count();
            $notconforme= DB::table('rules_conformite')->where('society_id','=', $soc)->where('isConforme','=', 0)->select()->count();
            $conformite=array('conforme'=> $conforme,'notconforme'=>$notconforme);
            $view->with('conformite',$conformite);
        });
        View::composer('client.*', function ($view) {
            $soc = DB::table('users')->where('id','=', session('Loggedclient'))->value('society_id');
           
            $themes= DB::table('user_themes')->join('themes','themes.id',"=",'user_themes.theme_id')->where('user_id','=', session('Loggedclient'))->pluck('themes.name','user_themes.theme_id');
            $themes_names=array();

            $theme_conformite=array();
            $theme_nonconformite=array();
            foreach($themes as $k=>$v){
                array_push($themes_names,$v);
                array_push( $theme_conformite,DB::table('rules_conformite')->join('text','text.id',"=",'rules_conformite.text_id')->where('text.theme_id',$k)->where('rules_conformite.society_id','=', $soc)->where('isConforme','=', 1)->select()->count());
                array_push($theme_nonconformite, DB::table('rules_conformite')->join('text','text.id',"=",'rules_conformite.text_id')->where('text.theme_id',$k)->where('rules_conformite.society_id','=', $soc)->where('isConforme','=', 0)->select()->count());
               
            }
            $domain=array($themes_names,$theme_conformite,$theme_nonconformite);
         
            
        /*     $conforme = DB::table('rules_conformite')->where('society_id','=', $soc)->where('isConforme','=', 1)->select()->count();
            $notconforme= DB::table('rules_conformite')->where('society_id','=', $soc)->where('isConforme','=', 0)->select()->count();
            $conformite=array('conforme'=> $conforme,'notconforme'=>$notconforme); */
            $view->with('domain',$domain);
        });





        View::composer('Suser.*', function ($view) {
            $data = ['LoggedUserInfo'=>users::where('id','=', session('LoggedSUser'))->first()];
            $view->with('data',$data);
        });
        View::composer('client.*', function ($view) {

            $data = ['LoggedUserInfo'=>users::where('id','=', session('Loggedclient'))->first()];
            $view->with('data',$data);
        });
        
        View::composer('Suser.*', function ($view) {
            $url_user=array('/ENVS','/HSSTS','/ENGS','/QLTS','/FNCS','/FSQS');
            $view->with('url',$url_user);
        });
        View::composer('Suser.*', function ($view) {
            $icon=array('tree','hard-hat','bolt','check-circle','landmark','hand-holding-usd');
            $view->with('icon',$icon);
        });
     
        View::composer('Suser.*', function ($view) {
            $data = users::where('id','=', session('LoggedSUser'))->first();
            $id=$data['id'];
            $users= DB::table('users')
            ->where('id','=', $id)
            ->get();
            $id_society = DB::table('users')->where('id','=', $id)->value('society_id');
            $societie= DB::table('societies')->where('id','=', "$id_society")->get();
            $societies=$societie[0];
            $view->with('societies',$societies);
        });
        View::composer('Suser.*', function ($view) {
            $themesdb=DB::table('themes')->get();
            $view->with('themesdb',$themesdb);
        });
        View::composer('Suser.Utilisateurs', function ($view) {
        $soc = DB::table('users')->where('id','=', session('LoggedSUser'))->first(); 
        $utilisateurs = DB::table('users')
                                ->select('id','first_name','CIN','last_name','email','Tel')
                                ->where('society_id',$soc->society_id)
                                ->where('profile','User')
                                ->get();
                                $view->with('utilisateurs',$utilisateurs);
                            });
       View::composer('Suser.Utilisateurs', function ($view) {
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
        $view->with('themeusers',$themeusers);
    });
        
    }
}
