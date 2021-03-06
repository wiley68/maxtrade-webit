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
Route::get('/dashboard', [AppController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');
Route::get('/community', [AppController::class, 'community'])->middleware(['auth'])->name('community');
Route::post('/project/new', [AppController::class, 'newProject'])->middleware(['auth'])->name('project.new');
Route::post('/project/clone', [AppController::class, 'cloneProject'])->middleware(['auth'])->name('project.clone');
Route::post('/project/save', [AppController::class, 'saveProject'])->middleware(['auth'])->name('project.save');
Route::post('/project/delete', [AppController::class, 'deleteProject'])->middleware(['auth'])->name('project.delete');

//auth routes
require __DIR__ . '/auth.php';
