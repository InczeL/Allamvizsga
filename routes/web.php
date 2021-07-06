<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
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


Route::post('taskDo',[TaskController::class,'CodeTesting']);
Route::get('/',[TaskController::class,'index']);
Route::get('/taskDesc',[TaskController::class,'getTasks'])->name('getTasks');
Route::get('/taskDetails/{id}',[TaskController::class,'getTaskById']);
Route::get('/taskResults/{id}',[TaskController::class,'taskResults'])->name('taskResults');

Route::post('/register',[UserController::class,'create']);
Route::post('login',[UserController::class,'check'])->name('check');
Route::get('/logout',[UserController::class,'logout'])->name('logout');

Route::group(['middleware'=>['AuthCheck']],function(){
    Route::get('/login',[UserController::class,'login'])->name('login');
    Route::get('/register',[UserController::class,'register'])->name('register');
    Route::get('/profile',[UserController::class,'Profile']);
    Route::post('/profile',[UserController::class,'updateAvatar']);
});

Route::group(['middleware'=>['RoleCheck']],function(){
    Route::get('/newtask',[TaskController::class,'newTask'])->name('newtask');
});