<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/',[HomeController::class,'home']);


//
Route::get('add-student',[StudentController::class, 'create'])->name('students.create');
Route::post('store-student',[StudentController::class, 'store'])->name('students.store');
