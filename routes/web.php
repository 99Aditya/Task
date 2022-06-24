<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users;
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

Route::get('/',[Users::class,'index']);
Route::post('/register',[Users::class,'userRegister']);
Route::get('/login',[Users::class,'login']);
Route::post('/userlogin',[Users::class,'userLogin']);
Route::get('/allBlogs',[Users::class,'allBlogs']);

Route::middleware('users')->group(function(){
 Route::get('/dashboard',[Users::class,'dashboard']);
 Route::post('/blog',[Users::class,'blogInsert']);
 Route::get('/blog-list',[Users::class,'blogsList']);
 Route::get('/blogEdit/{id}',[Users::class,'blogEdit']);
 Route::post('/blogUpdate/{id}',[Users::class,'blogUpdate']);
 Route::get('/blogDelete/{id}',[Users::class,'blogDelete']);

});
