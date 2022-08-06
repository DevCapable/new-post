<?php

use App\Http\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
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

Route::get('/',[controller::class,'getRegister']);
Route::post('/register',[controller::class,'register']);


Route::group(['prefix'=>'post'], function (){
    Route::get('/login',[controller::class,'getLogin']);
    Route::post('/login',[controller::class,'login']);

    Route::get('/sign-in/github',[LoginController::class, 'github']);
    Route::get('/sign-in/github/redirect/',[LoginController::class,'githubRedirect']);

    Route::get('/sign-in/facebook',[LoginController::class, 'facebook']);
    Route::get('/facebook/callback/',[LoginController::class,'facebookRedirect']);

    Route::get('/sign-in/google',[LoginController::class, 'google']);
    Route::get('/google/callback/',[LoginController::class,'googleRedirect']);
});

Route::group(['prefix'=>'user'], function (){
    Route::get('/',[controller::class,'getPostIndex']);
    Route::get('/create',[controller::class,'create'])->name('create');
    Route::post('/createPost',[controller::class,'getCreate']);
    Route::delete('/delete/{post}',[controller::class,'destroy']);
    Route::delete('/delete/{post}',[controller::class,'destroy']);

    Route::delete('/delete/{post}',[controller::class,'destroy'])->middleware('can::delete.post');
});



