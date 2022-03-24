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




Route::group(['midldleware'=>'guest'],function(){
    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');

    // Google login
    Route::get('/login/google', [App\Http\Controllers\Auth\LoginController::class, 'redirectToGoogle'])->name('login.google');
    Route::get('/login/google/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleGoogleCallback']);

    // Facebook login
    Route::get('login/facebook', [App\Http\Controllers\Auth\LoginController::class, 'redirectToFacebook'])->name('login.facebook');
    Route::get('login/facebook/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleFacebookCallback']);

    Route::post('/checkIdentificationPost',[Controllers\Auth\LoginController::class, 'checkID']);
    Route::get('/checkIdentification', function (){
        return view('auth.checkIdentification');
    })->name('checkIdentification');

    Route::get('/about',function(){return view('about');})->name('about');
});

Route::group(['middleware'=>'auth'],function(){
    Route::get('/user', [Controllers\UserController::class, 'index'])->name('user');
    Route::post('/add-update-user', [Controllers\UserController::class, 'store'])->name('store-user');
    Route::get('/edit-user', [Controllers\UserController::class, 'edit'])->name('edit-user');
    Route::post('/delete-user', [Controllers\UserController::class, 'destroy']);

    Route::get('/publish', [Controllers\PublishController::class, 'index'])->name('publish');
    
    Route::get('/program', [Controllers\ProgramController::class, 'index'])->name('program');
    Route::post('/add-update-program', [Controllers\ProgramController::class, 'store']);
    Route::post('/edit-program', [Controllers\ProgramController::class, 'edit']);
    Route::post('/delete-program', [Controllers\ProgramController::class, 'destroy']);

    Route::get('/faculty', [Controllers\FacultyController::class, 'index'])->name('faculty');
    Route::post('/add-update-faculty', [Controllers\FacultyController::class, 'store']);
    Route::post('/edit-faculty', [Controllers\FacultyController::class, 'edit']);
    Route::post('/delete-faculty', [Controllers\FacultyController::class, 'destroy']);

    Route::get('/academic', [Controllers\AcademicController::class, 'index'])->name('academic');
    Route::post('/add-update-academic', [Controllers\AcademicController::class, 'store']);
    Route::post('/edit-academic', [Controllers\AcademicController::class, 'edit']);
    Route::post('/delete-academic', [Controllers\AcademicController::class, 'destroy']);

    Route::get('/academic-level', [Controllers\AcademicLevelController::class, 'index'])->name('academic-level');
    Route::post('/add-update-academic-level', [Controllers\AcademicLevelController::class, 'store']);
    Route::post('/edit-academic-level', [Controllers\AcademicLevelController::class, 'edit']);
    Route::post('/delete-academic-level', [Controllers\AcademicLevelController::class, 'destroy']);

    Route::get('/admin', function () {
        return view('admin.admin');
    });
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/administrador-listausuario','AdministradorListaUsuarioController@getListaUsuarios');
    Route::get('/administrador-listapublicacion','AdministradorListaPublicacionController@getListaPublicaciones');
    Route::get('/feed','ClienteFeedController@getListaPublicaciones');
});

Auth::routes();
