<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

//-----------------------CRUD Teacher
Route::get('/create-teacher', [TeacherController::class, 'create'])->name('teacher.create');
Route::post('/create-teacher', [TeacherController::class, 'store'])->name('teacher.store');
Route::get('/teacher', [TeacherController::class, 'index'])->name('teacher.index');
Route::get('/edit-teacher/{id}', [TeacherController::class, 'edit'])->name('teacher.edit');
Route::put('/update-teacher/{id}', [TeacherController::class, 'update'])->name('teacher.update');
Route::delete('/delete-teacher/{id}', [TeacherController::class, 'delete'])->name('teacher.delete');



//-----------CRUD Student
Route::controller(StudentController::class)->name('student.')->group(function(){
    Route::get('/create-student', 'create')->name('create');
    Route::post('/create-student', 'insert')->name('insert');
    Route::get('/student', 'index')->name('index');
    Route::get('/edit-student/{id}', 'edit')->name('edit');
    Route::put('/update-student/{id}', 'update')->name('update');
    Route::delete('delete-student/{id}', 'delete')->name('delete');
});
