<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


#route for register 
Route::get('/register',[AuthController::class,'RegisterForm'])->name('register');
Route::post('/register',[AuthController::class,'RegisterStore'])->name('register.post');

#route login public
Route::get('/login',[AuthController::class,'login'])->name('login');
Route::post('/login',[AuthController::class,'loginStore'])->name('login.post');

Route::post('/logout',[AuthController::class,'logout'])->name('logout.post');
#Route Dashboard
Route::get('/dashboard',[AuthController::class,'index'])->middleware('checkauth');