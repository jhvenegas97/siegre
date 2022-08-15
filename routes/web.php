<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;

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
        if(Auth::check()) {
            return redirect('/home');
        } else {
            return view('welcome');
        }
    })->name('welcome');

    // Google login
    Route::get('/login/google', [App\Http\Controllers\Auth\LoginController::class, 'redirectToGoogle'])->name('login.google');
    Route::get('/login/google/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleGoogleCallback']);

    Route::post('/checkIdentificationPost',[Controllers\Auth\LoginController::class, 'checkID']);
    Route::get('/checkIdentification', function (){
        return view('auth.checkIdentification');
    })->name('checkIdentification');

    Route::get('/about',function(){return view('about');})->name('about');

    Route::get('/list-curriculum', [Controllers\ListCurriculumController::class, 'index'])->name('list-curriculum');
    Route::get('/curriculum', [Controllers\CurriculumController::class, 'index']);
    
});

Auth::routes();

Route::group(['middleware'=>'auth'],function(){
    /* Route::get('sendPublicationNotification', function () {
        event(new App\Events\PublicationEvent('$request'));
    }); */

    Route::resource('roles', Controllers\RoleController::class);
    Route::resource('permissions', Controllers\PermissionController::class);

    Route::get('/user', [Controllers\UserController::class, 'index'])->middleware('can:user-list')->name('user');
    Route::post('/add-update-user', [Controllers\UserController::class, 'store'])->middleware('any_permission:user-create,user-edit')->name('store-user');
    Route::get('/edit-user', [Controllers\UserController::class, 'edit'])->middleware('any_permission:user-edit')->name('edit-user');
    Route::post('/delete-user', [Controllers\UserController::class, 'destroy'])->middleware('any_permission:user-delete');
    Route::get('user-list-excel',[Controllers\UserController::class, 'exportExcel'])->middleware('any_permission:user-export-data')->name('users.excel');
    Route::post('assign-role-edit',[Controllers\UserController::class, 'assingRoleEdit'])->middleware('any_permission:assign-role')->name('assign-role-edit');
    Route::post('assign-role',[Controllers\UserController::class, 'assingRole'])->middleware('any_permission:assign-role')->name('assign-role');
    Route::post('change-state-edit',[Controllers\UserController::class, 'changeStateEdit'])->middleware('any_permission:change-state')->name('change-state-edit');
    Route::post('change-state',[Controllers\UserController::class, 'changeState'])->middleware('any_permission:change-state')->name('change-state');
    Route::post('store-admin',[Controllers\UserController::class, 'storeAdmin'])->middleware('any_permission:user-create')->name('store-admin');
    Route::get('create-user',[Controllers\UserController::class, 'createUser'])->middleware('any_permission:user-create')->name('create-user');

    Route::get('/program', [Controllers\ProgramController::class, 'index'])->middleware('can:program-list')->name('program');
    Route::post('/add-update-program', [Controllers\ProgramController::class, 'store'])->middleware('any_permission:program-create,program-edit');
    Route::post('/edit-program', [Controllers\ProgramController::class, 'edit'])->middleware('any_permission:program-edit');
    Route::post('/delete-program', [Controllers\ProgramController::class, 'destroy'])->middleware('any_permission:program-delete');

    Route::get('/faculty', [Controllers\FacultyController::class, 'index'])->middleware('can:faculty-list')->name('faculty');
    Route::post('/add-update-faculty', [Controllers\FacultyController::class, 'store'])->middleware('any_permission:faculty-create,faculty-edit');
    Route::post('/edit-faculty', [Controllers\FacultyController::class, 'edit'])->middleware('any_permission:faculty-edit');
    Route::post('/delete-faculty', [Controllers\FacultyController::class, 'destroy'])->middleware('any_permission:faculty-delete'); 

    Route::get('/gender', [Controllers\GenderController::class, 'index'])->middleware('can:gender-list')->name('gender');
    Route::post('/add-update-gender', [Controllers\GenderController::class, 'store'])->middleware('any_permission:gender-create,gender-edit');
    Route::post('/edit-gender', [Controllers\GenderController::class, 'edit'])->middleware('any_permission:gender-edit');
    Route::post('/delete-gender', [Controllers\GenderController::class, 'destroy'])->middleware('any_permission:gender-delete'); 

    Route::get('/academic-level', [Controllers\AcademicLevelController::class, 'index'])->middleware('can:academic-level-list')->name('academic-level');
    Route::post('/add-update-academic-level', [Controllers\AcademicLevelController::class, 'store'])->middleware('any_permission:academic-level-create,academic-level-edit');
    Route::post('/edit-academic-level', [Controllers\AcademicLevelController::class, 'edit'])->middleware('any_permission:academic-level-edit');
    Route::post('/delete-academic-level', [Controllers\AcademicLevelController::class, 'destroy'])->middleware('any_permission:academic-level-delete');

    Route::get('/work-type', [Controllers\WorkTypeController::class, 'index'])->middleware('can:work-type-list')->name('work-type');
    Route::post('/add-update-work-type', [Controllers\WorkTypeController::class, 'store'])->middleware('any_permission:work-type-create,work-type-edit');
    Route::post('/edit-work-type', [Controllers\WorkTypeController::class, 'edit'])->middleware('any_permission:work-type-edit');
    Route::post('/delete-work-type', [Controllers\WorkTypeController::class, 'destroy'])->middleware('any_permission:work-type-delete');

    Route::get('/feed', [Controllers\PublicationFeedController::class, 'index'])->middleware('can:publication-list')->name('feed');
    Route::get('/publications', [Controllers\PublicationFeedController::class, 'indexAdmin'])->middleware('role:Admin|Gestor')->name('publications');
    Route::get('/publication', [Controllers\PublicationDetailController::class, 'index'])->middleware('any_permission:publication-list,publication-admin-list');
    Route::post('/add-update-publication', [Controllers\PublicationFeedController::class, 'store'])->middleware('any_permission:publication-create,publication-edit,publication-admin-create,publication-admin-edit');
    Route::post('/edit-publication', [Controllers\PublicationFeedController::class, 'edit'])->middleware('any_permission:publication-edit,publication-admin-edit');
    Route::post('/delete-publication', [Controllers\PublicationFeedController::class, 'destroy'])->middleware('any_permission:publication-delete,publication-admin-delete');

    Route::get('/academic', [Controllers\AcademicController::class, 'index'])->middleware('can:academic-list')->name('academic');
    Route::post('/add-update-academic', [Controllers\AcademicController::class, 'store'])->middleware('any_permission:academic-create,academic-edit');
    Route::post('/edit-academic', [Controllers\AcademicController::class, 'edit'])->middleware('any_permission:academic-edit');
    Route::post('/delete-academic', [Controllers\AcademicController::class, 'destroy'])->middleware('any_permission:academic-delete');

    Route::get('/work', [Controllers\WorkController::class, 'index'])->middleware('can:work-list')->name('work');
    Route::post('/add-update-work', [Controllers\WorkController::class, 'store'])->middleware('any_permission:work-create,work-edit');
    Route::post('/edit-work', [Controllers\WorkController::class, 'edit'])->middleware('any_permission:work-edit');
    Route::post('/delete-work', [Controllers\WorkController::class, 'destroy'])->middleware('any_permission:work-delete');

    Route::get('/reports-jobs-user', [Controllers\ReportsController::class, 'jobsUser'])->middleware('can:reports-system')->name('jobs-user');
    Route::get('jobs-user-list-excel',[Controllers\ReportsController::class, 'exportJobsUserExcel'])->middleware('any_permission:user-export-data')->name('jobs-user.excel');
    
    Route::get('/reports-last-job-user', [Controllers\ReportsController::class, 'lastJobUser'])->middleware('can:reports-system')->name('last-job-user');
    Route::get('last-job-user-list-excel',[Controllers\ReportsController::class, 'exportLastJobUserExcel'])->middleware('any_permission:user-export-data')->name('last-job-user.excel');

    Route::get('/reports-last-login-user', [Controllers\ReportsController::class, 'lastLoginUser'])->middleware('can:reports-system')->name('last-login-user');
    Route::get('last-login-user-list-excel',[Controllers\ReportsController::class, 'exportLastLoginUserExcel'])->middleware('any_permission:user-export-data')->name('last-login-user.excel');

    Route::get('/reports-working-user', [Controllers\ReportsController::class, 'workingUser'])->middleware('can:reports-system')->name('working-user');
    Route::get('working-user-list-excel',[Controllers\ReportsController::class, 'workingUserExcel'])->middleware('any_permission:user-export-data')->name('working-user.excel');

    Route::get('/reports-college-degree-user', [Controllers\ReportsController::class, 'collegeDegreeUser'])->middleware('can:reports-system')->name('college-degree-user');
    Route::get('college-degree-user-list-excel',[Controllers\ReportsController::class, 'collegeDegreeUserExcel'])->middleware('any_permission:user-export-data')->name('college-degree-user.excel');

    Route::get('/reports-gender-employability-user', [Controllers\ReportsController::class, 'genderEmployabilityUser'])->middleware('can:reports-system')->name('gender-employability-user');
    Route::get('gender-employability-user-list-excel',[Controllers\ReportsController::class, 'genderEmployabilityUserExcel'])->middleware('any_permission:user-export-data')->name('gender-employability-user.excel');

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/reports', [App\Http\Controllers\ReportsController::class, 'index'])->middleware('can:reports-system')->name('reports');
});