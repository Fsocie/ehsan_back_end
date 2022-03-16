<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CasController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaysController;
use App\Http\Controllers\CarnetController;
use App\Http\Controllers\ParamètreController;
use App\Http\Controllers\SimpleQRcodeController;
use App\Http\Controllers\CollectController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserController;


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
Route::post('/home', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('admin.login');
Route::post('/logout',[App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('admin.logout');

Route::group(['middleware' => 'auth:sanctum'], function(){

    Route::get('/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
    Route::get('/parametre', [ParamètreController::class, 'index'])->name('admin.paramatre.index');
    //pays
    Route::get('/pays', [PaysController::class, 'index'])->name('admin.pays.index');
    Route::get('/addpays', [PaysController::class, 'viewformadd'])->name('admin.pays.store');
    Route::post('/addpays', [PaysController::class, 'store'])->name('admin.pays.store');
    Route::get('/update/pays/{id}', [PaysController::class, 'viewformupdate'])->name('admin.pays.update');
    Route::post('/update/pays/{id}', [PaysController::class, 'update'])->name('admin.pays.update');
    Route::get('/delete/pays/{id}', [PaysController::class, 'destroy'])->name('admin.pays.delete');
  // Signalement d'un cas
    Route::get('/cas/signal', [CasController::class, 'index'])->name('admin.signal.index');
    Route::get('/show/cas/{id}', [CasController::class, 'show'])->name('admin.signal.show');

    //carnet utilisation

    Route::get('/carnet/index', [CarnetController::class, 'index'])->name('admin.carnet.index');
    Route::get('/show/carnet/{id}', [CarnetController::class, 'show'])->name('admin.carnet.show');

    //Qr code enfant
    Route::get("simple-qrcode/{id}",  [SimpleQRcodeController::class, 'generate'])->name('admin.qrcode.show');
    Route::get("index",  [SimpleQRcodeController::class, 'index'])->name('admin.qrcode.index');

    //collectes
    Route::get("collectes",[CollectController::class,'index'])->name("admin.collectes.index");
    Route::get("collectes/create",[CollectController::class,'create'])->name("admin.collectes.create");
    Route::POST("collectes/store",[CollectController::class,'store'])->name("admin.collectes.store");
    Route::get("collectes/show/{collect}",[CollectController::class,'show'])->name("admin.collectes.show");
    Route::get("collectes/edit/{collecte}",[CollectController::class,'edit'])->name("admin.collectes.edit");
    Route::put("collectes/update/{collecte}",[CollectController::class,'update'])->name("admin.collectes.update");
    Route::delete("collectes/delete/{collecte}",[CollectController::class,'destroy'])->name("admin.collectes.delete");
  





});

Route::group(['middleware' => 'auth:sanctum'],function(){
  //users
  Route::resource("/users",UserController::class);
  //roles
  Route::get("/roles/{role}/assign-permission",[RoleController::class,'assignPermissionView'])->name('roles.assign.permission');
  Route::post("/roles/{role}/assign-permission",[RoleController::class,'assignPermission'])->name('roles.store.permission');
  Route::resource("/roles",RoleController::class);
 
  //permissions
  Route::resource("/permissions",PermissionController::class);
});

