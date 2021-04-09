<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\SuperController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

//Routes Tests

Route::get('/test',function(){
    return view('general.layout');
    // $user=User::find(1);
    // dd($user->role->role);
    // Role::create([
    //     'role'=>"df"
    // ]);
    // User::create([
    //     "nom"=>'test',
    //     "prenom"=>'test',
    //     "role_id"=>'1',
    //     "module"=>'2',
    //     "mdp"=>'test',
    // ]);
});


Route::view('/','general.home')->name('home');
Route::get('/login',[AccountController::class,'formsHandler'])->name('login');
Route::post('/login',[AccountController::class,'formsHandler'])->name('login_treat');
Route::get('/logup',[AccountController::class,'formsHandler'])->name('logup');
Route::post('/logup',[AccountController::class,'formsHandler'])->name('logup_treat');
Route::post('/admin',[AccountController::class,'formsHandler'])->name('admin_logup');

// rOUTES NEEDS aUTHENFICATION
Route::group(['middleware'=>'auth'],function(){

//root's routes
Route::group(['middleware'=>'root_access'],function(){
    Route::get('/root',[SuperController::class,'home'])->name('root_home');
});




//admin's routes
Route::group(['middleware'=>'admin_access'],function(){
    Route::get('/admin',[SuperController::class,'home'])->name('root_home');
});





//teacher's routes
Route::group(['middleware'=>'teacher_access'],function(){
    Route::get('/teacher',[SuperController::class,'home'])->name('root_home');
});





//student's routes
Route::group(['middleware'=>'root_acces'],function(){
    Route::get('/teacher',[SuperController::class,'home'])->name('root_home');
});





});