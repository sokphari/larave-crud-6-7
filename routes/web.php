<?php

use App\Http\Controllers\StudentController;
use App\Models\Student;
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
Route::get('/student/table',[StudentController::class,'index'])->name('table');
Route::get('/create',[StudentController::class,'create'])->name('index');
Route::post('/student/create',[StudentController::class,'store'])->name('student.create');
Route::delete('/student/{id}',[StudentController::class,'destroy'])->name('delete');