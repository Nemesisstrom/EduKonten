<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Admin\MateriController as AdminMateriController;



Route::get('/', [MateriController::class, 'index'])->name('home');

Route::get('/materi', action: [MateriController::class, 'index'])->name('materi');

Route::get('/tips', [HomeController::class, 'tips'])->name('tips');

// Resource route untuk Materi
Route::resource('materi', MateriController::class);
Route::get('/materi/{materi}/edit', [MateriController::class, 'edit'])->name('materi.edit')->middleware('auth');
Route::put('/materi/{materi}', [MateriController::class, 'update'])->name('materi.update')->middleware('auth');
Route::delete('/materi/{materi}', [MateriController::class, 'destroy'])->name('materi.destroy')->middleware('auth');

// Admin Routes
Route::middleware(['auth', 'admin'])->name('admin.')->prefix('admin')->group(function () {
    Route::resource('materi', AdminMateriController::class)->except(['show']);
});

// Rute untuk komentar
Route::post('/materi/{materi}/comments', [CommentController::class, 'store'])->name('comments.store')->middleware('auth');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

