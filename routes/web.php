<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/',[HomeController::class,'home']);


//
Route::get('add-students',[StudentController::class, 'create'])->name('students.create');
Route::get('view-students',[StudentController::class, 'list'])->name('students.list');
Route::post('store-students',[StudentController::class, 'store'])->name('students.store');

//delete
Route::get('destroy-students/{stu_id}',[StudentController::class, 'destroy'])->name('students.destroy');

//edit
Route::get('edit-students/{stu_id}',[StudentController::class, 'edit'])->name('students.edit');

//update
Route::put('update-students/{stu_id}',[StudentController::class, 'update'])->name('students.update');



