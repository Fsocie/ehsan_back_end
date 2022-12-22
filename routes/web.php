<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CasController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaysController;
use App\Http\Controllers\CarnetController;
use App\Http\Controllers\ParamètreController;
use App\Http\Controllers\SimpleQRcodeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CollectController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\BeneficiaireController;
use App\Http\Controllers\EnfantController;
use App\Http\Controllers\AgentController;
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


Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
Route::post('/home', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('admin.login');
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('admin.logout');


Route::group(['middleware' => 'auth:sanctum'], function () {

 
  Route::get('/parametre', [ParamètreController::class, 'index'])->name('admin.paramatre.index');
  Route::get('/parametre/records', [ParamètreController::class, 'records'])->name('admin.paramatre.records');

  //pays
  Route::get('/pays', [PaysController::class, 'index'])->name('admin.pays.index');
  Route::get('/delete/pays/{id}', [PaysController::class, 'destroy'])->name('admin.pays.delete');

  // Signalement d'un cas
  Route::get('/cas/signal', [CasController::class, 'index'])->name('admin.signal.index');
  Route::get('/show/cas/{id}', [CasController::class, 'show'])->name('admin.signal.show');

  //carnet utilisation
  Route::get('/carnet/index', [CarnetController::class, 'index'])->name('admin.carnet.index');
  Route::get('/show/carnet/{id}', [CarnetController::class, 'show'])->name('admin.carnet.show');

  //Qr code enfant
  Route::get("simple-qrcode/{id}",[SimpleQRcodeController::class, 'generate'])->name('admin.qrcode.show');
  Route::get("enfants",[SimpleQRcodeController::class, 'index'])->name('admin.enfants.liste');

  //message
  Route::get('/message', [App\Http\Controllers\MessageController::class, 'message'])->name('message');
  Route::get('/recherche', [App\Http\Controllers\MessageController::class, 'recherche'])->name('message.recherche');
  //Route::get('/notification', [App\Http\Controllers\MessageController::class, 'notification'])->name('notification');

  Route::get('/compose', [App\Http\Controllers\ComposeController::class, 'compose'])->name('compose');
  Route::post('/composePost', [App\Http\Controllers\ComposeController::class, 'composePost'])->name('composePost');

  Route::get('/read-message/{contact_id}', [App\Http\Controllers\ReadMessageController::class, 'readMessage'])->name('rm');
  Route::post('/read-message/{contact_id}', [App\Http\Controllers\ReadMessageController::class, 'postMessage'])->name('rm-post');

/******************************************************************************************************************/
//Qr code Parents
Route::get("parent-qrcode/{id}",  [SimpleQRcodeController::class, 'parentQrCodeGenerate'])->name('admin.parentQrcode.show');
//Page de profile du parent d'un enfant dont on a le carnet de santé
Route::get('profile/{id}',[UserController::class,'ProfileUtilisateur'])->name('profile.user');

//**********************************MODULE DES BENEFICIAIRES**********************************
Route::view("formulaire-ajoute-Beneficiaire","backend.beneficiaires.beneficiaire")->name('admin.beneficiare.view');
Route::post("ajouterBeneficiaire",[BeneficiaireController::class,'addBeneficiaire'])->name('admin.beneficiaire.store');
Route::get('liste-des-beneficiaires',[BeneficiaireController::class,'listeBeneficiaire'])->name('admin.user.listeBeneficiaire');
Route::get("beneficiaire/{id}/edit",[BeneficiaireController::class,'edit'])->name('admin.beneficiaire.edit');

//**********************************MODULE DES ENFANTS**********************************
Route::get('formulaire-ajout-enfant',[EnfantController::class,'formulaireAjoutEnfant'])->name("admin.formulaire.ajoutEnfant");
Route::post("ajouterEnfant",[EnfantController::class,'addEnfant'])->name('admin.enfant.store');
Route::get("liste-des-enfant",[EnfantController::class,'listeEnfants'])->name('admin.users.listeEnfant');
/******************************************************************************************************************/
});



//collectes
Route::get("collectes", [CollectController::class, 'index'])->name("admin.collectes.index");
Route::get("collectes/create", [CollectController::class, 'create'])->name("admin.collectes.create");
Route::POST("collectes/store", [CollectController::class, 'store'])->name("admin.collectes.store");
Route::get("collectes/show/{collect}", [CollectController::class, 'show'])->name("admin.collectes.show");
Route::get("collectes/edit/{collecte}", [CollectController::class, 'edit'])->name("admin.collectes.edit");
Route::put("collectes/update/{collecte}", [CollectController::class, 'update'])->name("admin.collectes.update");
Route::delete("collectes/delete/{collecte}", [CollectController::class, 'destroy'])->name("admin.collectes.delete");
//whatsapp
//https://web.whatsapp.com/
Route::view("whatsapp", "backend/whatsapp/whatsapp")->name("whatsapp.index");


Route::group(['middleware' => 'role:Admin'], function () {
  //**********************************MODULE DES UTILISATEURS**********************************
  Route::resource("/users", UserController::class);
  //**********************************MODULE DES AGENTS**********************************
  Route::get('agents',[AgentController::class,'index'])->name("agents.liste");
  //Liste de simple Utilisateurs
  Route::get('utilisateurs',[UserController::class,'listeUtilisteurs'])->name("utilisateurs.liste");
  //roles
  Route::resource("/roles", RoleController::class);
  //Les supports
  Route::resource("/supports", SupportController::class);
});


