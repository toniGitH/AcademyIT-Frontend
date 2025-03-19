<?php

use App\Http\Controllers\GradeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use Illuminate\Support\Facades\Route;


/* Route::get('/', function () {
    return view('welcome');
}); */
// WELCOME ROUTE
Route::get('/', [StudentController::class, 'index'])->name('students.index');

// FRONTEND STUDENTS ROUTES
Route::get('/students', [StudentController::class, 'index'])->name('students.index');
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
Route::post('/students', [StudentController::class, 'store'])->name('students.store');
Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');
Route::put('/students/{id}', [StudentController::class, 'update'])->name('students.update');
Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');
Route::get('/students/{student}/expedient', [StudentController::class, 'expedient'])->name('students.expedient');


// FRONTEND SUBJECTS ROUTES
Route::get('subjects', [SubjectController::class, 'index'])->name('subjects.index');
Route::get('subjects/create', [SubjectController::class, 'create'])->name('subjects.create');
Route::post('subjects', [SubjectController::class, 'store'])->name('subjects.store');
Route::get('subjects/{subject}', [SubjectController::class, 'show'])->name('subjects.show');
Route::get('subjects/{subject}/edit', [SubjectController::class, 'edit'])->name('subjects.edit');
Route::put('subjects/{subject}', [SubjectController::class, 'update'])->name('subjects.update');
Route::delete('subjects/{subject}', [SubjectController::class, 'destroy'])->name('subjects.destroy');

// FRONTEND GRADES ROUTES
Route::get('grades', [GradeController::class, 'index'])->name('grades.index');
Route::get('grades/create', [GradeController::class, 'create'])->name('grades.create');
Route::post('grades', [GradeController::class, 'store'])->name('grades.store');
Route::get('grades/{id}/edit', [GradeController::class, 'edit'])->name('grades.edit');
Route::put('grades/{id}', [GradeController::class, 'update'])->name('grades.update');
Route::delete('grades/{id}', [GradeController::class, 'destroy'])->name('grades.destroy');