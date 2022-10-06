<?php

use App\Models\users;
use App\Http\Controllers\Thème;
use App\Http\Controllers\Sections;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Territoire;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Utilisateurs;
use App\Http\Controllers\formcontroller;
use App\Http\Controllers\Maincontroller;
use App\Http\Controllers\Susercontroller;
use App\Http\Controllers\Clientcontroller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Textereglementaire;
use App\Http\Controllers\EditprofileController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\EdituserprofileController;
use App\Http\Controllers\EditadminprofileController;
use CMI\CmiClient;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function(){
    return view('home.acceuil');
});
Route::get('/prices', function(){
    return view('forms.formstep7');
});

/*--------------------------- form------------------------------------- */
Route::get('/forms',[formcontroller::class, 'form']);

/* Route::get('/insert',[formcontroller::class, 'insert']); */
Route::post('/insert',[formcontroller::class, 'insertpost']);

/* Route::get('/offer',[formcontroller::class, 'offer']);
Route::post('/offer',[formcontroller::class, 'offerpost']); */

Route::get('/addtheme',[formcontroller::class, 'theme'])->name('forms.theme');
Route::post('/addtheme',[formcontroller::class, 'themepost'])->name('forms.themepost');

Route::get('/selectsection',[formcontroller::class, 'selectsection'])->name('forms.add');
Route::post('/selectsection',[formcontroller::class, 'adduserpost'])->name('forms.addpost');
/* Route::get('/select',[formcontroller::class, 'select']); */
Route::get('/selectbranche',[formcontroller::class, 'selectbranche'])->name('forms.selectbranche');
Route::post('/selectbranche',[formcontroller::class, 'selectbranchepost'])->name('forms.selectbranchepost');

Route::get('/selectsousbranche',[formcontroller::class, 'selectsousbranche'])->name('forms.selectsousbranche');;
Route::post('/selectsousbranche',[formcontroller::class, 'selectsousbranchepost'])->name('forms.selectsousbranchepost');;

Route::get('/selectactivity',[formcontroller::class, 'selectactivite'])->name('forms.selectactivity');;
Route::post('/selectactivity',[formcontroller::class, 'selectactivitepost'])->name('forms.selectactivitypost');;
/*--------------------------- form------------------------------------- */

/* Route::get('/dashboard/territoire/province',[territoire::class, 'province']);
Route::get('/dashboard/territoire/commune',[territoire::class, 'commune']); */

/* 
/* Route::get('/dashboard/territoire/province',[territoire::class, 'province']);
Route::get('/dashboard/territoire/commune',[territoire::class, 'commune']); */

/* 
/dashboard/TexteReglementaire/texts
/dashboard/TexteReglementaire/BO
 */



Route::get('login', [MainController::class, "logout"])->name('logout');
Route::get('/sauthentifier', [MainController::class, "login"])->name('login');
Route::get('/check', [MainController::class, "check"])->name('check');
Route::get('/sinscrire', [MainController::class, "register"])->name('register');
Route::post('/save_register', [MainController::class, "save"])->name('save');
Route::get('/acceuil', [MainController::class, "home"]);

Route::post('/changepassword',[ChangePasswordController::class,'store']);
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');


/* -------------------profile-------------------------- */

/* -------------------profile-------------------------- */


/* -------------------profile-------------------------- */







Route::group([ 'middleware'=>['isAdmin','Preventback']], function(){
    Route::get('/acceuil', [MainController::class, "home"]);
    Route::get('/dashboard/utilisateurs/tableau',[Utilisateurs::class, 'tableau']);
    Route::post('/dashboard/utilisateurs/tableau/update/',[Utilisateurs::class, 'updateuser']);
    Route::post('/dashboard/utilisateurs/tableau/delete/{id}',[Utilisateurs::class, 'deleteuser']);
    Route::post('/dashboard/utilisateurs/tableau/adduser/',[Utilisateurs::class, 'adduser']);
    Route::get('/dashboard/utilisateurs/activites_user',[Utilisateurs::class, 'activite']);
    Route::get('/dashboard/TexteReglementaire/user_detail/{id}',[Utilisateurs::class, 'Userdetail']);
    Route::get('/dashboard/utilisateurs/theme',[Utilisateurs::class, 'theme']);
    Route::get('/dashboard/secteursdactivites/activities',[Sections::class, 'activities']);
    Route::post('/dashboard/secteursdactivites/activities/update/',[Sections::class, 'updateactivity']);
    Route::post('/dashboard/secteursdactivites/activities/delete/{id}',[Sections::class, 'deleteactivity']);
    Route::post('/dashboard/secteursdactivites/activities/addactivity/',[Sections::class, 'addactivity']);
    Route::get('/dashboard/secteursdactivites/branche',[Sections::class, 'branche']);
    Route::post('/dashboard/secteursdactivites/branche/update/',[Sections::class, 'updatebranche']);
    Route::post('/dashboard/secteursdactivites/branche/delete/{id}',[Sections::class, 'deletebranche']);
    Route::post('/dashboard/secteursdactivites/branche/addbranche/',[Sections::class, 'addbranche']);
    Route::get('/dashboard/secteursdactivites/sousbranche',[Sections::class, 'sousbranche']);
    Route::post('/dashboard/secteursdactivites/sousbranche/update/',[Sections::class, 'updatesousbranche']);
    Route::post('/dashboard/secteursdactivites/sousbranche/delete/{id}',[Sections::class, 'deletesousbranche']);
    Route::post('/dashboard/secteursdactivites/sousbranche/addsousbranche/',[Sections::class, 'addsousbranche']);
    Route::get('/dashboard/secteursdactivites/sections',[Sections::class, 'sections']);
    Route::post('/dashboard/secteursdactivites/sections/update/',[Sections::class, 'updatesections']);
    Route::post('/dashboard/secteursdactivites/sections/delete/{id}',[Sections::class, 'deletesections']);
    Route::post('/dashboard/secteursdactivites/sections/addsection/',[Sections::class, 'addsections']);
    Route::get('/dashboard/themes/theme',[Thème::class, 'theme']);
    Route::post('/dashboard/themes/theme/update/',[Thème::class, 'updatetheme']);
    Route::post('/dashboard/themes/theme/delete/{id}',[Thème::class, 'deletetheme']);
    Route::post('/dashboard/themes/theme/addtheme/',[Thème::class, 'addtheme']);
    Route::get('/dashboard/themes/aspects',[Thème::class, 'aspects']);
    Route::post('/dashboard/themes/aspects/update/',[Thème::class, 'updateaspect']);
    Route::post('/dashboard/themes/aspects/delete/{id}',[Thème::class, 'deleteaspect']);
    Route::post('/dashboard/themes/aspects/addaspect/',[Thème::class, 'addaspect']);
    Route::get('/dashboard/themes/sousaspects',[Thème::class, 'sousaspects']);
    Route::post('/dashboard/themes/sousaspects/update/',[Thème::class, 'updatesousaspect']);
    Route::post('/dashboard/themes/sousaspects/delete/{id}',[Thème::class, 'deletesousaspect']);
    Route::post('/dashboard/themes/sousaspects/addsousaspect/',[Thème::class, 'addsousaspect']);
    Route::get('/dashboard/TexteReglementaire/texts',[Textereglementaire::class, 'texts']);
    Route::get('/dashboard/TexteReglementaire/definitions',[Textereglementaire::class, 'definitions']);
    Route::post('/dashboard/TexteReglementaire/updatedefinition',[Textereglementaire::class, 'updatedefinition']);
    Route::post('/dashboard/TexteReglementaire/adddefinition',[Textereglementaire::class, 'adddefinition']);
    Route::post('/dashboard/TexteReglementaire/deletedefinition/{id}',[Textereglementaire::class, 'deletedefinition']);
    Route::get('/dashboard/TexteReglementaire/sanctions',[Textereglementaire::class, 'sanctions']);
    Route::post('/dashboard/TexteReglementaire/updatesanction',[Textereglementaire::class, 'updatesanction']);
    Route::post('/dashboard/TexteReglementaire/addsanction',[Textereglementaire::class, 'addsanction']);
    Route::post('/dashboard/TexteReglementaire/deletesanction/{id}',[Textereglementaire::class, 'deletesanction']);
    Route::post('/dashboard/TexteReglementaire/texts/delete/{id}',[Textereglementaire::class, 'delete_text']);
    Route::post('/dashboard/TexteReglementaire/texts/update/',[Textereglementaire::class, 'update_text']);
    Route::post('/dashboard/TexteReglementaire/texts/addtext/',[Textereglementaire::class, 'add_text']);
    Route::get('/dashboard/TexteReglementaire/BO',[Textereglementaire::class, 'BO']);
    Route::post('/dashboard/TexteReglementaire/BO/update/',[Textereglementaire::class, 'updateBO']);
    Route::post('/dashboard/TexteReglementaire/BO/delete/{id}',[Textereglementaire::class, 'deleteBO']);
    Route::post('/dashboard/TexteReglementaire/BO/addBO/',[Textereglementaire::class, 'add_BO']);
    Route::get('/dashboard/TexteReglementaire/rules/',[Textereglementaire::class, 'rules']);
    Route::post('/dashboard/TexteReglementaire/rules/update/',[Textereglementaire::class, 'updaterule']);
    Route::post('/dashboard/TexteReglementaire/rules/delete/{id}',[Textereglementaire::class, 'deleterule']);
    Route::post('/dashboard/TexteReglementaire/rules/addrule/',[Textereglementaire::class, 'addrule']);
    Route::get('/dashboard/utilisateurs/societies/',[Utilisateurs::class, 'societies']);
    Route::post('/dashboard/utilisateurs/societies/update/',[Utilisateurs::class, 'updatesociety']);
    Route::post('/dashboard/utilisateurs/societies/delete/{id}',[Utilisateurs::class, 'deletesociety']);
    Route::post('/dashboard/utilisateurs/societies/addsociety/',[Utilisateurs::class, 'addsociety']);

    Route::get('/dashboard/territoire/region',[Territoire::class, 'region']);
    Route::post('/dashboard/territoire/region/delete/{id}',[Territoire::class, 'delete_region']);
    Route::post('/dashboard/territoire/region/update/',[Territoire::class, 'update_region']);
    Route::post('/dashboard/territoire/region/addregion/',[Territoire::class, 'add_region']);
    Route::get('/dashboard/territoire/prefecture',[Territoire::class, 'prefecture']);
    Route::post('/dashboard/territoire/prefecture/delete/{id}',[Territoire::class, 'delete_prefecture']);
    Route::post('/dashboard/territoire/prefecture/update/',[Territoire::class, 'update_prefecture']);
    Route::post('/dashboard/territoire/prefecture/addprefecture/',[Territoire::class, 'add_prefecture']);
    /* Route::get('/dashboard/territoire/province',[territoire::class, 'province']);
    Route::get('/dashboard/territoire/commune',[territoire::class, 'commune']); */
    /* -------------------profile-------------------------- */
    Route::get('/Adminprofile',[ProfileController::class,'adminprofile']) ->name('adminprofile');
    Route::get('/Adminp', [EditadminprofileController::class,'admin']);
    Route::post('/editadmin', [EditadminprofileController::class,'editadmin']);
    Route::get('/updateusertheact/{id}',[Utilisateurs::class, 'showupdate']);
    Route::post('/updateuseractthe/{id}',[Utilisateurs::class, 'updateuseractthe']); 
    Route::get('Cpass', function(){
        $data = ['LoggedUserInfo'=>users::where('id','=', session('LoggedUser'))->first()];
            return view('user_dashboard.Cpass',$data);
        })->name('Cpass');

});
Route::group(['middleware'=>['isSUser','Preventback']], function(){

    Route::get('/actionplan', function(){
        return view('Suser.actionplan');
    });
    /* -----------Suser :edit-delete-add --------*/
    Route::get('/updateuser/{id}',function($id){
        $user=DB::table('users')->select('first_name','CIN','last_name','email','Tel')->where('id',$id)->first();
        return view('Suser.editusers',['id'=>$id,'user'=>$user]);
    });
    Route::post('/updatepage/{id}',[Susercontroller::class, 'edit']);
    
    Route::get('/deleteuser/{id}',function($id){
        $user=DB::table('users')->select('first_name','CIN','last_name','email','Tel')->where('id',$id)->first();
        return view('Suser.delete',['id'=>$id,'user'=>$user]);
    });
    
    Route::post('/deletepage/{id}',[Susercontroller::class, 'delete']);
    
    Route::get('/addpage',function(){
        return view('Suser.addusers');
    });
    Route::get('/SSynthese',[Susercontroller::class, 'synthese']);
    Route::post('/addusers',[Susercontroller::class, 'add']);
    
    /* -----------Suser :edit-delete-add --------*/
    Route::get('/SUtilisateurs',[Susercontroller::class, 'tableau']);
    
    Route::get('CSpass', function(){
        $data = ['LoggedUserInfo'=>users::where('id','=', session('LoggedSUser'))->first()];
            return view('Suser.CSPass',$data);
        })->name('CSpass');
    Route::get('/profile',[ProfileController::class,'index']) ->name('profile');
    Route::post('/editprofile',[EditprofileController::class,'edit']);
    Route::get('/editsociety', [EditprofileController::class,'society']);
    Route::get('/responsable', [EditprofileController::class,'responsable']);
    Route::post('/editresponsable', [EditprofileController::class,'editresponsable']);
    /* -------------------profile-------------------------- */
    Route::get('/ENVS',[Susercontroller::class, "env"]);
    Route::get('/HSSTS',[Susercontroller::class, "hsst"]);
    Route::get('/ENGS',[Susercontroller::class, "eng"]);
    Route::get('/QLTS',[Susercontroller::class, "qlt"]);
    Route::get('/FNCS',[Susercontroller::class, "fnc"]);
    Route::get('/FSQS',[Susercontroller::class, "fsq"]);
    
    Route::get('/lois_Suser/{id}',[Susercontroller::class, 'lois']);
    Route::post('/updaterules',[Susercontroller::class, 'conformite']);
    /* -------------------profile-------------------------- */
    /* -----------------plan d'action ----------------------*/
    Route::get('/ENVS/actionplan',[Susercontroller::class, "envactionplan"]);
    Route::get('/HSSTS/actionplan',[Susercontroller::class, "hsstactionplan"]);
    Route::get('/ENGS/actionplan',[Susercontroller::class, "engactionplan"]);
    Route::get('/QLTS/actionplan',[Susercontroller::class, "qltactionplan"]);
    Route::get('/FNCS/actionplan',[Susercontroller::class, "fncactionplan"]);
    Route::get('/FSQS/actionplan',[Susercontroller::class, "fsqactionplan"]);
     
    
    Route::post('/actionplan/{text_id}',[Susercontroller::class, 'actionplan']);
    Route::post('/actionplanaccompli/{plan_id}',[Susercontroller::class, 'actionplanaccompli']);
    
    
    Route::post('/updateplan/{id}',[Susercontroller::class, 'updateplan']);
    Route::get('/updateplanpage/{id}/{theme_plan}',[Susercontroller::class, 'updateplanpage']);
    Route::get('/deleteplan/{id}',[Susercontroller::class, 'deleteplan']);








});

Route::group(['middleware'=>['isUser','Preventback']], function(){
    /* -------------------profile-------------------------- */
Route::get('/userprofile',[ProfileController::class,'userprofile']) ->name('userprofile');
Route::get('/userp', [EdituserprofileController::class,'user']);
Route::post('/edituserp', [EdituserprofileController::class,'edituser']);
Route::get('/user',[Clientcontroller::class, "client"]);
Route::post('/actionplanaccompliuser/{plan_id}',[Clientcontroller::class, 'actionplanaccompli']);


Route::post('/updaterulesclient',[Clientcontroller::class, 'conformite']);


Route::get('/ENV/actionplanuser',[Clientcontroller::class, "envactionplan"]);
Route::get('/HSST/actionplanuser',[Clientcontroller::class, "hsstactionplan"]);
Route::get('/ENG/actionplanuser',[Clientcontroller::class, "engactionplan"]);
Route::get('/QLT/actionplanuser',[Clientcontroller::class, "qltactionplan"]);
Route::get('/FNC/actionplanuser',[Clientcontroller::class, "fncactionplan"]);
Route::get('/FSQ/actionplanuser',[Clientcontroller::class, "fsqactionplan"]);
 
Route::post('/actionplanuser/{text_id}',[Clientcontroller::class, 'actionplan']);
Route::post('/updateplanuser/{id}',[Clientcontroller::class, 'updateplan']);
Route::get('/updateplanpageuser/{id}/{theme_plan}',[Clientcontroller::class, 'updateplanpage']);
Route::get('/deleteplanuser/{id}',[Clientcontroller::class, 'deleteplan']);
Route::get('/user',[Clientcontroller::class, "client"]);
Route::get('/lois/{id}',[Clientcontroller::class, 'lois']);
Route::get('/ENV',[Clientcontroller::class, "env"]);
Route::get('/HSST',[Clientcontroller::class, "hsst"]);
Route::get('/ENG',[Clientcontroller::class, "eng"]);
Route::get('/QLT',[Clientcontroller::class, "qlt"]);
Route::get('/FNC',[Clientcontroller::class, "fnc"]);
Route::get('/FSQ',[Clientcontroller::class, "fsq"]);
 Route::get('CCpass', function(){
        $data = ['LoggedUserInfo'=>users::where('id','=', session('Loggedclient'))->first()];
            return view('client.CCPass',$data);
        })->name('CCpass');

});
Route::post('process',function (Request $request){
    $base_url=config('app.url'); 
    $client = new CmiClient([
       'storekey' => 'TEST1234', // STOREKEY
       'clientid' => '600000000', // CLIENTID
       'Storetype' => '3D_PAY_HOSTING',
       'oid' => $request->cmd, // COMMAND ID IT MUST BE UNIQUE
       'shopurl' => 'YOUR_DOMAIN_HERE', // SHOP URL FOR REDIRECTION
       'okUrl' =>  $base_url.'/okFail', // REDIRECTION AFTER SUCCEFFUL PAYMENT
       'failUrl' =>  $base_url.'okFail ', // REDIRECTION AFTER FAILED PAYMENT
       'email' => 'mehdi.rochdi@gmail.com', // YOUR EMAIL APPEAR IN CMI PLATEFORM
       'BillToName' => 'mehdi rochdi', // YOUR NAME APPEAR IN CMI PLATEFORM
       'BillToCompany' => 'company name', // YOUR COMPANY NAME APPEAR IN CMI PLATEFORM
       'amount' => $request->amount, // RETRIEVE AMOUNT WITH METHOD POST
       'CallbackURL' => $base_url.'/callback', // CALLBACK
   ]);
 $client->redirect_post();  
 }
 )->name('process');

