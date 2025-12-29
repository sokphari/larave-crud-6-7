<?php

use App\Http\Controllers\CustomerController;
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

Route::get('/create',[CustomerController::class,'create'])->name('create.get');
Route::post('/customer',[CustomerController::class,'store'])->name('store.post');
Route::get('/display',[CustomerController::class,'table'])->name('table.get');
Route::delete('/display/{id}',[CustomerController::class,'destroy'])->name('destroy.delete');
Route::get('/customer/{id}',[CustomerController::class,'edit'])->name('edit.get');