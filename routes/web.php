<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Google login
Route::get('/login/google', [App\Http\Controllers\Auth\LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('/login/google/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleGoogleCallback']);

// Facebook login
Route::get('login/facebook', [App\Http\Controllers\Auth\LoginController::class, 'redirectToFacebook'])->name('login.facebook');
Route::get('login/facebook/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleFacebookCallback']);

Route::get('/admin', function () {
    return view('admin.admin');
});

Route::get('/program', [Controllers\ProgramController::class, 'index']);
Route::post('/add-update-program', [Controllers\ProgramController::class, 'store']);
Route::post('/edit-program', [Controllers\ProgramController::class, 'edit']);
Route::post('/delete-program', [Controllers\ProgramController::class, 'destroy']);

Route::group(['midldleware'=>'guest'],function(){
    Route::post('/checkIdentificationPost',[Controllers\Auth\LoginController::class, 'checkID']);
    Route::get('/checkIdentification', function (){
        return view('auth.checkIdentification');
    })->name('checkIdentification');
});

Route::group(['middleware'=>'auth'],function(){
    /*Route::get('/programs',[Controllers\ProgramController::class, 'index'])->name('programIndex');
    Route::post('/program/store',[Controllers\ProgramController::class, 'store'])->name('programStore');*/


    Route::get('/administrador-listausuario','AdministradorListaUsuarioController@getListaUsuarios');
    Route::get('/administrador-listapublicacion','AdministradorListaPublicacionController@getListaPublicaciones');
    Route::get('/feed','ClienteFeedController@getListaPublicaciones');
});

Auth::routes();
