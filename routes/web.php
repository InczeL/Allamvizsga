<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
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


Route::get('/taskDo',[MainController::class,'taskDo']);
Route::post('taskDo',[MainController::class,'saveFile']);
Route::get('/',[MainController::class,'index']);
Route::get('/taskDesc',[MainController::class,'getTasks']);
Route::get('/taskDetails/{id}',[MainController::class,'getTaskById']);
Route::get('/taskDescF',[MainController::class,'getFilteredTask'])->name('getFilteredTask');


Route::post('/register',[UserController::class,'create']);
Route::post('login',[UserController::class,'check'])->name('check');
Route::get('/logout',[UserController::class,'logout'])->name('logout');

Route::get('/profile',[UserController::class,'Profile']);
Route::post('/profile',[UserController::class,'updateAvatar']);

Route::get('/newtask',[UserController::class,'NewTask']);
Route::post('/newtask',[MainController::class,'putTask'])->name('newtask');

Route::group(['middleware'=>['AuthCheck']],function(){
    Route::get('/login',[UserController::class,'login'])->name('login');
    Route::get('/register',[UserController::class,'register'])->name('register');
});