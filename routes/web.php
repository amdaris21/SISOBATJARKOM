<?php

use App\Http\Controllers\Admin\ModuleController;
use App\Http\Controllers\Admin\LessonController;
use App\Http\Controllers\Admin\QuizController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LessonController as UserLessonController;
use App\Http\Controllers\QuizController as UserQuizController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    // Tahap 12: Katalog Materi
    Route::get('/lesson', [UserLessonController::class, 'index'])->name('lesson');
    
    // Tahap 13: Detail Materi & Trigger Progress
    Route::get('/lesson/{slug}', [UserLessonController::class, 'show'])->name('lesson.show');
    Route::post('/lesson/{id}/complete', [UserLessonController::class, 'complete'])->name('lesson.complete');

    // Tahap 14 & 15: User Quiz ZEP & Progress
    Route::get('/quiz', [UserQuizController::class, 'index'])->name('quiz');
    Route::get('/quiz/{id}', [UserQuizController::class, 'show'])->name('quiz.show');
    Route::post('/quiz/{id}/start', [UserQuizController::class, 'start'])->name('quiz.start');
    Route::post('/quiz/{id}/complete', [UserQuizController::class, 'complete'])->name('quiz.complete');
});

Route::get('/about', function () {
    return view('about');
})->middleware(['auth', 'verified'])->name('about');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
| Route yang dilindungi middleware 'admin'.
| Hanya user dengan role 'admin' yang bisa mengakses.
*/
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard Admin
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // CRUD Modul — Tahap 7
    Route::resource('modules', ModuleController::class);

    // CRUD Materi — Tahap 9
    Route::resource('lessons', LessonController::class);

    // CRUD Quiz — Tahap 10
    Route::resource('quizzes', QuizController::class);
});

require __DIR__.'/auth.php';

