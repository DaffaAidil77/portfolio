<?php

use App\Http\Controllers\dashboardController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\questionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [homeController::class, 'index']);
Route::post('question/store', [questionController::class, 'store'])->name('question.store');
Route::get('dashboard', [dashboardController::class, 'index'])->name('dashboard');
