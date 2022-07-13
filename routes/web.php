<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

//web routes
Route::get('/', [PageController::class, 'index'])->name('index');
Route::get('/documentation', [PageController::class, 'documentation'])->name('documentation');
Route::get('/projects', [PageController::class, 'projects'])->name('projects');
Route::get('/news', [PageController::class, 'news'])->name('news');

//app routes
Route::get('/dashboard', [AppController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');
Route::get('/community', [AppController::class, 'community'])->middleware(['auth'])->name('community');

//auth routes
require __DIR__.'/auth.php';
