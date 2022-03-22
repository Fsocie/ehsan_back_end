<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CasController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaysController;
use App\Http\Controllers\CarnetController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ParamètreController;
use App\Http\Controllers\SimpleQRcodeController;


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
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('admin.logout');


Route::group(['middleware' => 'auth:sanctum'], function () {

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

  //message
  Route::get('/message', [App\Http\Controllers\MessageController::class, 'message'])->name('message');
  Route::get('/recherche',[App\Http\Controllers\MessageController::class, 'recherche'])->name('message.recherche');

  Route::get('/compose', [App\Http\Controllers\ComposeController::class, 'compose'])->name('compose');
  
  Route::post('/composePost', [App\Http\Controllers\ComposeController::class, 'composePost'])->name('composePost');
  Route::get('/read-message/{contact_id}', [App\Http\Controllers\ReadMessageController::class, 'readMessage'])->name('rm');
  
});