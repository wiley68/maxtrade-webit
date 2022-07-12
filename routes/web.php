<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

//web routes
Route::get('/', [PageController::class, 'index'])->name('index');

//app routes
Route::get('/dashboard', [AppController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');

//auth routes
require __DIR__.'/auth.php';
