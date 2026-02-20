<?php

use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

Route::get('/create-teacher', [TeacherController::class, 'create'])->name('teacher.create');
Route::post('/create-teacher', [TeacherController::class, 'store'])->name('teacher.store');
Route::get('/', [TeacherController::class, 'index'])->name('teacher.index');