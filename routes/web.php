<?php

use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

Route::get('/create-teacher', [TeacherController::class, 'create'])->name('teacher.create');
Route::post('/create-teacher', [TeacherController::class, 'store'])->name('teacher.store');
Route::get('/', [TeacherController::class, 'index'])->name('teacher.index');
Route::get('/edit-teacher/{id}', [TeacherController::class, 'edit'])->name('teacher.edit');
Route::put('/update-teacher/{id}', [TeacherController::class, 'update'])->name('teacher.update');
Route::delete('/delete-teacher/{id}', [TeacherController::class, 'delete'])->name('teacher.delete');