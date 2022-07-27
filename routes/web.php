<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

//web routes
Route::get('/', [PageController::class, 'index'])->name('index');
Route::get('/documentation', [PageController::class, 'documentation'])->name('documentation');
Route::get('/projects', [PageController::class, 'projects'])->name('projects');
Route::get('/news', [PageController::class, 'news'])->name('news');
Route::get('/donate', [PageController::class, 'donate'])->name('donate');
Route::get('/sponsors', [PageController::class, 'sponsors'])->name('sponsors');

//app routes
Route::get('/app', [AppController::class, 'app'])->middleware(['auth'])->name('app');
Route::get('/community', [AppController::class, 'community'])->middleware(['auth'])->name('community');

//auth routes
require __DIR__.'/auth.php';
