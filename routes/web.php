<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
//Route::get('students',[\App\Http\Controllers\StudentsController::class,'index'])->name('students.index');
//Route::get('students/{id}',[\App\Http\Controllers\studentsController::class,'show'])->name('students.show');
Route::middleware('auth')->group(function() {
Route::get('students/index',[\App\Http\Controllers\StudentsController::class,'index'],'index')->name('students.index');
Route::get('students/create',[\App\Http\Controllers\StudentsController::class,'create'])->name('students.create');
Route::post('students/store',[\App\Http\Controllers\StudentsController::class,'store'])->name('students.store');

Route::get('students/{id}/edit',[\App\Http\Controllers\studentsController::class,'edit'])->name('students.edit');
Route::put('students/{id}/update',[\App\Http\Controllers\studentsController::class,'update'])->name('students.update');
Route::get('students/id}/delete{',[\App\Http\Controllers\studentsController::class,'destroy'])->name('students.destroy');
Route::resource('departments',\App\Http\Controllers\DepartmentController::class);


//Route::resource('teachers',\App\Http\Controllers\TeacherController::class);
    Route::get('teachers/index',[\App\Http\Controllers\TeacherController::class,'index'],'index')->name('teachers.index');
    Route::get('teachers/create',[\App\Http\Controllers\TeacherController::class,'create'])->name('teachers.create');
    Route::post('teachers/store',[\App\Http\Controllers\TeacherController::class,'store'])->name('teachers.store');

    Route::get('teachers/{id}/edit',[\App\Http\Controllers\TeacherController::class,'edit'])->name('teachers.edit');
    Route::put('teachers/{id}/update',[\App\Http\Controllers\TeacherController::class,'update'])->name('teachers.update');
    Route::get('teachers/id}/delete{',[\App\Http\Controllers\TeacherController::class,'destroy'])->name('teachers.destroy');
    Route::resource('departments',\App\Http\Controllers\DepartmentController::class);

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
