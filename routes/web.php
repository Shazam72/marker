<?php

use App\Http\Controllers\AccountController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

//Routes Tests

Route::get('/test',function(){
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
