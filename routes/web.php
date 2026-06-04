<?php

use App\Http\Controllers\Admin\ModuleController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/lesson', function () {
    return view('lesson');
})->middleware(['auth', 'verified'])->name('lesson');

Route::get('/lesson1-detail', function () {
    return view('lesson1-detail');
})->middleware(['auth', 'verified'])->name('lesson1-detail');

Route::get('/about', function () {
    return view('about');
})->middleware(['auth', 'verified'])->name('about');

Route::get('/quiz', function () {
    return view('quiz');
})->middleware(['auth', 'verified'])->name('quiz');
Route::get('/bantuan', function () {
    return view('bantuan');
})->name('bantuan');


Route::get('/bantuan', function () {
    return view('bantuan');
})->middleware(['auth', 'verified'])->name('bantuan');

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
});

require __DIR__.'/auth.php';

